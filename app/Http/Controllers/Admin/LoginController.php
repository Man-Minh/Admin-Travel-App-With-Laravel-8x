<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Man create
use Mail; 
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\RedirectResponse ;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL; // Man create
use Illuminate\Http\File;

class LoginController extends Controller 
{
    protected function fixImage(User $img) 
    {
        if(Storage::disk('public')->exists($img->img)) {
            $img->img = Storage::url($img->img);
        }
        else {
            $img->img = '/images/no_img.jpg';
        }
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $messages = [
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được bỏ trống',
        ];

        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'], 
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => 1]))  {
                $token= strtoupper(Str::random(10));
                $user = User::where('email', $request->email)->first();
                $user->update(['token'=>$token]);
                $request->session()->regenerate();

                $this->fixImage($user);
                session(['pass' => $request->password]);
                session(['img' => $user->img]); // Do dùng Auth nên không có thể xử lý phần hình ảnh 
                //Nêu phải thay đổi qua user rồi truyền qua theo session
                
                return redirect()->route('admin.thongke');
                
        }

        return back()->withErrors([
            'email' => 'Sai email hoặc mật khẩu !.',
        ]);
    }

    public function showForm()
    {
        return view('login');
    }

    
/**
 * Log the user out of the application.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function postQuenMatKhau(Request $request)
    {
        $request->validate([
            'email'=>'required|exists:users'
        ],[
            'email.required'=>'Vui lòng nhập email',
            'email.exists'=>'Email này không tồn tại trong hệ thống!'
        ]);

    
        $token= strtoupper(Str::random(10));
        $user = User::where('email', $request->email)->first();
        $user->update(['token'=>$token]);

        Mail::send('emails.quen_mat_khau_email', compact('user'), function($email) use($user) {
            $email->subject('Admin Travel App - Quên mật khẩu');
            $email->to($user->email,$user->name);
           
        });
        return redirect()->back()->with('notification','Vui lòng kiểm tra lại email để hoàn tất khôi phục mật khẩu!');
    }

    public function showQuenMatKhau()
    {
        return view('quen_mat_khau');
    }

    public function showDatMatKhau(User $user, $token)
    {
        if($user->token === $token)
        {
            return view('dat_lai_mat_khau');
        }

        return abort(404);
    }

    public function postDatMatKhau(User $user, $token, Request $request)
    {
       $request->validate([
            'password' => 'required',
            'confirmPassword'=> 'required|same:password',
       ]);
       
       $newPass = bcrypt($request->password);
       $user->update(['password' => $newPass, 'token'=> null]);
       return redirect()->route('login')->with('notification','Hoàn tất thay đổi mật khẩu hãy thử đăng nhập nào');
    }
    
}