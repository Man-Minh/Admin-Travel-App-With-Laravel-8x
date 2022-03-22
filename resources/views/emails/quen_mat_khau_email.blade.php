<div style="width:723px; margin: 0 auto">
   <div style="text-align: center">
      <h2> Xin chào {{$user->name}} </h2>
      <p>Đây là email khôi phục mật khẩu trên hệ thống của bạn</p>
      <p>Vui lòng click vào đường link để đặt lại mật khẩu</p>
      <p>
         <a href="{{route('datmatkhau',['user'=>$user->id,'token'=>$user->token])}}" 
            style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-weight:bold"> Khôi phục mật khẩu
         </a>
      </p>
   </div>
</div>