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
            'name.required' => 'Vui l??ng kh??ng b??? tr???ng t??n!',
            'name.min' => 'T??n t???i thi???u 3 k?? t???',
            'name.max' => 'T??n t???i ??a 20 ky t???',
            'email.required' => 'Email kh??ng ???????c b??? tr???ng',
            'email.email' => 'Email kh??ng ????ng ?????nh d???ng',
            'email.min' => 'Email t???i thi???u 3 k?? t???',
            'email.max' => 'Email t???i ??a 50 ky t???',
            'sdt.required' => 'Vui l??ng kh??ng b??? tr???ng sdt!',
            'sdt.min' => 'S??? ??i???n tho???i t???i thi???u 10 k?? t???',
            'sdt.max' => 'S??? ??i???n tho???i t???i ??a 11 ky t???',
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

        if($request->password == "") { // N???u m?? ng?????i ta c?? c???p nh???t pass th?? l???y pass ???? 
            $pass = $user->password;
        } else // c??n kh??ng update th?? s??i pass c??
        {
            $messages = [
                'password_confirmation.required' => 'Vui l??ng kh??ng b??? tr???ng !',
                'password.confirmed' => 'M???t kh???u x??c nh???n kh??ng kh???p' ,
                'oldPassword.required' => 'M???t kh???u c?? kh??ng ???????c b??? tr???ng',
                'oldPassword.different' => 'M???t kh???u c??? kh??ng tr??ng kh???p'
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
      
        // return redirect()->route('admin.taiKhoan')->with('notification','???? c???p nh???t');
        $this->fixImage2($user);
        session(['img' => $user->img]); // Do d??ng Auth n??n kh??ng c?? th??? x??? l?? ph???n h??nh ???nh
        return redirect()->route('admin.taiKhoan')->with('notification','???? c???p nh???t');
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
        return redirect()->route('admin.taiKhoan')->with('notification','???? x??a');
    }

    public function block($id, int $status)
    {
        $user =  User::where('id',$id)->first();
        $user->fill([
            'status' => $status
        ]);
        $user->save();
        return redirect()->route('admin.taiKhoan')->with('notification','???? kh??a');
    }

    public function Unblock($id,int $status)
    {
        $user =  User::where('id',$id)->first();
        $user->fill([
            'status' => $status
        ]);
        $user->save();
        return redirect()->route('admin.taiKhoan')->with('notification','???? m??? kh??a');
    }
}
