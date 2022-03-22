@extends('layouts.layout_admin')
@section('css')
<link rel="stylesheet" href="{{ asset('../styles/css/styleTable.css') }}">
@endsection
@section('content')
<!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Danh Sách Tài Khoản</h3>
              </div>
            </div>
            <!-- End Page Header -->
            
            <!-- Default Dark Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small overflow-hidden mb-4">
                  <div class="card-header bg-dark">
                  <h6 style="display: inline;"  class="m-0 text-white"><a href="#"> Tài Khoản </a></h6>
                  <div class="dropdown" style="display: inline;" > 
                      <button style="position: absolute; left: 789px; top: -7px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Dropdown button -->
                      <i class="fas fa-filter"></i>
                      </button>
                   
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <form action="" > <button class="dropdown-item" type="submit" ><input type="hiden" style="display:none" name="keyfilterDesc" value="ten_dia_danh" > Tên Z-A</button> </form>
                      <form action="" >   <button class="dropdown-item" type="submit" ><input type="hiden"style="display:none"  name="keyfilter"  value="ten_dia_danh" > Tên A-Z </button> </form>
                      <form action="" >  <button class="dropdown-item" type="submit" ><input type="hiden"style="display:none"  name="keyfilterDesc" value="created_at" > Mới nhất</button> </form>
                      <form action="" >  <button class="dropdown-item" type="submit" ><input type="hiden"style="display:none"  name="keyfilter" value="created_at" >Đã cũ</button> </form>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0 pb-3 bg-dark text-center">
                    <table class="table table-dark mb-0">
                      <thead class="thead-dark">
                     
                        <tr>
                          <th scope="col" class="border-bottom-0">STT</th>
                          <th scope="col" class="border-bottom-0">id User</th>
                          <th scope="col" class="border-bottom-0">Tên</th>
                          <th scope="col" class="border-bottom-0">Email</th>
                          <th scope="col" class="border-bottom-0">Avatar</th>
                          <th scope="col" class="border-bottom-0">SDT</th>
                          <th scope="col" class="border-bottom-0">Status</th>
                          <th scope="col" class="border-bottom-0">Quản lý</th>
                        </tr>
                    
                      </thead>
                      <tbody>
                      @foreach($dsTaiKhoan as $key=>$tk)
                        @if($tk->isAdmin == 0) <!--Neu la admin thi khong hien thias-->
                        <tr>
                          <td class="key" >{{$key}}</td>
                          <td>{{$tk->id}}</td>
                          <td>{{$tk->name}}</td>
                          <td>{{$tk->email}}</td>
                          <td><img style="width:100px" src="{{$tk->img}}" alt=""></td>
                          <td>{{$tk->sdt}}</td>    
                          <td>
                              @if($tk->status == 0)
                              <span class="badge badge-danger">Đang khóa</span>
                              @else
                              <span class="badge badge-success">Bình thường</span>
                              @endif
                            </td> 
                        
                          <td style="display: inline-flex;"> 
                              @if($tk->status == 0)
                               <form action="{{route('admin.XuLyKhoa',['id'=>$tk->id, 'status'=>1])}}" method="POST" > @csrf <button  style="background-color: #212529;font-weight:bold;margin-right: 15px;" type="submit" ><i style="color:green;" class="fa fa-unlock"></i></button>   </form>
                              @else
                              <form action="{{route('admin.XuLyMoKhoa',['id'=>$tk->id, 'status'=>0])}}" method="POST" > @csrf <button  style="background-color: #212529;font-weight:bold;margin-right: 15px;" type="submit" ><i style="color:red;" class="fa fa-lock"></i></button>   </form>
                              @endif
                            
                            <form onSubmit="return confirm('Bạn chắc là xóa chứ ?')" action="{{route('admin.XuLyXoa',['id'=>$tk->id])}}" method="POST" > @csrf  @method('DELETE') <button  style="background-color: #212529;font-weight:bold" type="submit" ><i style="color:red" class="fa fa-trash-o"></i></button>  </form>
                          </td> 
                        </tr>
                        @endif
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="">
            {{ $dsTaiKhoan->appends(request()->all())->links() }} <!--appends(request()->all()) khi ma next qua page khac thi cai link tren url se khong bi mat-->
            </div>
            <!-- End Default Dark Table -->
          </div>
@endsection