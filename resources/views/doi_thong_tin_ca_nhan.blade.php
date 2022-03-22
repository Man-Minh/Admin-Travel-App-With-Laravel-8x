<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link hrel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css">
<link rel="stylesheet" href="{{ asset('../styles/css/doithongtincanhan.css') }}">
<script src="{{asset('../styles/js/jquery.min.js')}}"></script>
<div class="container">
<div class="row flex-lg-nowrap">
  <!-- <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a></li>
        </ul>
      </div>
    </div>
  </div> -->

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <!-- <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span> -->
                      <img src="{{$user->img}}" style="width:140px;height:140px;" id="output"/>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>
                    <p class="mb-0">@ {{$user->name}} </p>
                    <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                    <div class="mt-2">
                      <form action="" method="post"></form>
                      <button class="btn btn-primary" type="button" onfocus="document.getElementById('fileInput').type='file'" onclick="document.getElementById('fileInput').click();">      
                        <i class="fa fa-fw fa-camera"></i>
                        <!-- <span>Change Photo</span> -->
                        <label for="file">
                        Change Photo
                        </label>
                        <!-- <input  type="file" name="image" id="">
                        <span>Change Photo</span>  -->
                       
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">administrator</span>
                    <div class="text-muted"><small>Joined 09 Dec 2022</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" method="POST" enctype="multipart/form-data" name="signupForm" id="signupForm" novalidate="" action="{{route('admin.capnhattaikhoan',['id'=>$user->id])}}" >
                  @csrf 
                  <input style="display:none;" accept="image/*" name="image" id="fileInput" type="file" onchange="loadFile(event)"> <!--Gửi tạm thẻ input ở đây-->
                  <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Name</label>
                              @if ($errors->has('name')) 
                              <span style="color:red" class="error-message"> {{ $errors->first('name') }} </span>
                              @endif
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="{{$user->name}}">
                            </div>
                          </div>
                          <!-- <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" type="text" name="username" placeholder="johnny.s" value="johnny.s">
                            </div>
                          </div> -->
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              @if ($errors->has('email')) 
                              <span style="color:red" class="error-message"> {{ $errors->first('email') }} </span>
                              @endif
                              <input class="form-control" type="text" name="email" placeholder="user@example.com" value="{{$user->email}}"  >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>SDT</label>
                              @if ($errors->has('sdt')) 
                              <span style="color:red" class="error-message"> {{ $errors->first('sdt') }} </span>
                              @endif
                              <input class="form-control" type="text" name="sdt" value="{{$user->sdt}}" >
                            </div>
                          </div>
                        </div>
                        <!-- <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea class="form-control" rows="5" placeholder="My Bio"></textarea>
                            </div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>  <i class="typcn typcn-eye" id="eye"></i>
                              @if ($errors->has('oldPassword')) 
                              <span style="color:red" class="error-message"> {{ $errors->first('oldPassword') }} </span>
                              @endif
                              <input class="form-control" type="password"  id="oldPassword" name="oldPassword">
                              <input class="form-control" type="hidden" name="checkPass" id="hidenCheck" value="{{session('pass')}}"> <!-- Chứa pass cũ để so sánh -->
                              <span id='message'></span> <!--Xuất thông báo-->
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label> <i class="typcn typcn-eye" id="eye2" >  </i>
                              @if ($errors->has('password')) 
                              <span style="color:red" class="error-message"> {{ $errors->first('password') }} </span>
                              @endif
                              <input class="form-control"  type="password" id="pwd" name="password" >
                              <span id='message'></span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label> <i class="typcn typcn-eye" id="eye3"></i>
                              @if ($errors->has('password_confirmation')) 
                              <span style="color:red" class="error-message"> {{ $errors->first('password_confirmation') }} </span>
                              @endif
                              <input class="form-control" type="password" id="confirmPwd" name="password_confirmation" ></div>
                              <span id='messageConfirm'></span>
                            </div>
                        </div>
                      </div>
                      <!-- <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b>Keeping in Touch</b></div>
                        <div class="row">
                          <div class="col">
                            <label>Email Notifications</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                <label class="custom-control-label" for="notifications-news">Newsletter</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" id="submitButton" type="submit" >Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
            <form action="{{route('logout')}}" method="post">@csrf
              <button type="submit" class="btn btn-block btn-secondary">
              <i class="fa fa-sign-out"></i>
              <span>Logout</span>
              </button>
            </form>  
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

</script>
<script src="{{ asset('../styles/js/ThongTinCaNhan.js') }}"></script>