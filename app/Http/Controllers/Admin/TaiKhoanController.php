<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; // Man create
use Illuminate\Http\File;

class TaiKhoanController extends Controller
{
    protected function fixImage2(User $img) 
    {
        if(Storage::disk('public')->exists($img->img)) {
            $img->img = Storage::url($img->img);
        }
        else {
            $img->img = '/images/no_img.jpg';
        }
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsTaiKhoan = User::searchuser()->paginate(4);
        foreach ($dsTaiKhoan as $tk) {
            $this->fixImage2($tk);
        }
        return view('tai_khoan', ['dsTaiKhoan'=>$dsTaiKhoan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $this->fixImage2($user);
        return view('doi_thong_tin_ca_nhan',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Vui lòng không bỏ trống tên!',
            'name.min' => 'Tên tối thiểu 3 ký tự',
            'name.max' => 'Tên tối đa 20 ky tự',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.min' => 'Email tối thiểu 3 ký tự',
            'email.max' => 'Email tối đa 50 ky tự',
            'sdt.required' => 'Vui lòng không bỏ trống sdt!',
            'sdt.min' => 'Số điện thoại tối thiểu 10 ký tự',
            'sdt.max' => 'Số điện thoại tối đa 11 ky tự',
        ];

        $data = $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|min:3|max:40',
            'sdt' => 'required|min:10|max:11'
        ], $messages);

        $user = User::where('id',$id)->first();
        $pass = $user->password; 

        if($request->hasFile('image')) {
            
            Storage::disk('public')->delete($user->img);
            $user->img = $request->file('image')->store('profiles','public');
        }

        if($request->password == "") { // Nếu mà người ta có cập nhật pass thì lấy pass đó 
            $pass = $user->password;
        } else // còn không update thì sài pass cũ
        {
            $messages = [
                'password_confirmation.required' => 'Vui lòng không bỏ trống !',
                'password.confirmed' => 'Mật khẩu xác nhận không khớp' ,
                'oldPassword.required' => 'Mật khẩu cũ không được bỏ trống',
                'oldPassword.different' => 'Mật khẩu củ không trùng khớp'
            ];
            $data = $request->validate([
                'oldPassword' => 'required|different:checkPass',
                'password' => 'required|confirmed|min:3|max:20',
                'password_confirmation' => 'required| min:4'
               
            ], $messages);
            $pass = $request->input('password');
        }

        $user->fill([
            'name'=>$request->input('name'),
            'email' =>$request->input('email'),
            'sdt' =>$request->input('sdt'),
            'password'=> bcrypt($pass)
        ]);
        $user->save();
      
        // return redirect()->route('admin.taiKhoan')->with('notification','Đã cập nhật');
        $this->fixImage2($user);
        session(['img' => $user->img]); // Do dùng Auth nên không có thể xử lý phần hình ảnh
        return redirect()->route('admin.taiKhoan')->with('notification','Đã cập nhật');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.taiKhoan')->with('notification','Đã xóa');
    }

    public function block($id, int $status)
    {
        $user =  User::where('id',$id)->first();
        $user->fill([
            'status' => $status
        ]);
        $user->save();
        return redirect()->route('admin.taiKhoan')->with('notification','Đã khóa');
    }

    public function Unblock($id,int $status)
    {
        $user =  User::where('id',$id)->first();
        $user->fill([
            'status' => $status
        ]);
        $user->save();
        return redirect()->route('admin.taiKhoan')->with('notification','Đã mở khóa');
    }
}
