@extends('layouts.layout_admin')
@section('css')
<link rel="stylesheet" href="{{ asset('../styles/css/styleTable.css') }}">
@endsection
@section('content')

<!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Danh Sách Bài Viết</h3>
              </div>
            </div>
            <!-- End Page Header -->
            
            <!-- Default Dark Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small overflow-hidden mb-4">
                  <div class="card-header bg-dark">
                  <h6 style="display: inline;" class="m-0 text-white"><a class="add" href="#"> Bài viết</a></h6>

                  <div class="dropdown" style="display: inline;" > 
                      <button style="position: absolute; left: 789px; top: -7px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Dropdown button -->
                      <i class="fas fa-filter"></i>
                      </button>
                   
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <form action="" > <button class="dropdown-item" type="submit" ><input type="hiden" style="display:none" name="keyfilterDesc" value="noi_Dung" > Tên Z-A</button> </form>
                      <form action="" >   <button class="dropdown-item" type="submit" ><input type="hiden"style="display:none"  name="keyfilter"  value="noi_Dung" > Tên A-Z </button> </form>
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
                          <th scope="col" class="border-bottom-0">id</th>
                          <th scope="col" class="border-bottom-0">Ngày Tạo</th>
                          <th scope="col" class="border-bottom-0">Tác giả</th>
                          <th scope="col" class="border-bottom-0">Địa Danh</th>
                          <th scope="col" class="border-bottom-0">Trạng Thái</th>
                         <th scope="col" class="border-bottom-0">Quản lý</th>
                        </tr>
                    
                      </thead>
                      <tbody>
                      @if($dsBaiViet != null)
                      @foreach($dsBaiViet as $key=>$bv)
                      
                        <tr>
                          <td class="key">{{$key}}</td>
                          <td>{{$bv->id}}</td>
                          <td>{{$bv->created_at->format('m-d-Y')}}</td>
                          <td>{{$bv->thongTinUser->name}}</td>
                          <td>{{$bv->thongTinDiaDanh->ten_dia_danh}}</td>                
                          <td>
                              @if($bv->status == 1) 
                              <span class="badge badge-success">Bình thường</span>
                              @else
                              <span class="badge badge-danger">Bị khóa</span>
                              @endif
                          </td>   
                          <td style="display: inline-flex;">
                               @if($bv->status == 0)
                              <form action="{{route('admin.BlockAndUnblock',['id'=>$bv->id, 'status'=>1])}}" method="POST" > @csrf <button  style="background-color: #212529;font-weight:bold;margin-right: 15px;" type="submit" ><i style="color:green;" class="fa fa-unlock"></i></button>   </form>
                              @else
                              <form action="{{route('admin.BlockAndUnblock',['id'=>$bv->id, 'status'=>0])}}" method="POST" > @csrf <button  style="background-color: #212529;font-weight:bold;margin-right: 15px;" type="submit" ><i style="color:red;" class="fa fa-lock"></i></button>   </form>
                              @endif     
                              <form action="{{route('admin.showbaiviet', ['id'=>$bv->id])}}"style="margin-right: 15px" > @csrf   <button  style="background-color: #212529;font-weight:bold" type="submit" ><i class="fa fa-book"></i></button>  </form>
                              <form onSubmit="return confirm('Bạn chắc là xóa chứ ?')" action="{{route('admin.xoaBaiViet',['id'=>$bv->id])}}" method="POST" > @csrf  @method('DELETE') <button  style="background-color: #212529;font-weight:bold" type="submit" ><i style="color:red" class="fa fa-trash-o"></i></button>  </form>
                          </td> 
                        </tr>
                    
                      @endforeach
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @if($dsBaiViet != null)
            <div class="">
            {{ $dsBaiViet->appends(request()->all())->links() }} <!--appends(request()->all()) khi ma next qua page khac thi cai link tren url se khong bi mat-->
            </div>
            @endif
            <!-- End Default Dark Table -->
          </div>
@endsection