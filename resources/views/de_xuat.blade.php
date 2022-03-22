@extends('layouts.layout_admin')
@section('css')
<link rel="stylesheet" href="{{ asset('../styles/css/styleTable.css') }}">
@endsection
@section('content')
<script src="{{'../styles/js/jquery.min.js'}}"></script>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Danh Sách Đề Xuất</h3>
              </div>
              

            </div>
            <!-- End Page Header -->
            
            <!-- Default Dark Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small overflow-hidden mb-4">
                  <div class="card-header bg-dark" >
                  <h6 style="display: inline;" class="m-0 text-white"><a class="add" href="#"> Các đề xuất</a></h6>
                  <div class="dropdown" style="display: inline;" > 
                      <button style="position: absolute; left: 789px; top: -7px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Dropdown button -->
                      <i class="fas fa-filter"></i>
                      </button>
                   
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <form action="" > <button class="dropdown-item" type="submit" ><input type="hiden" style="display:none" name="keyfilterDesc" value="ten_Diem" > Tên Z-A</button> </form>
                      <form action="" >   <button class="dropdown-item" type="submit" ><input type="hiden"style="display:none"  name="keyfilter"  value="ten_Diem" > Tên A-Z </button> </form>
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
                          <th scope="col" class="border-bottom-0">Loại địa danh</th>
                          <th scope="col" class="border-bottom-0">Người đề xuất</th>
                          <th scope="col" class="border-bottom-0">Tên địa danh</th>
                          <th scope="col" class="border-bottom-0">Tên khác</th>
                          <th scope="col" class="border-bottom-0">Mô tả</th>
                          <th scope="col" class="border-bottom-0">Kinh độ</th>
                          <th scope="col" class="border-bottom-0">Vĩ độ</th>
                          <th scope="col" class="border-bottom-0"></th>
                          <th scope="col" class="border-bottom-0"></th>
                          <th scope="col" class="border-bottom-0"></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($dsDeXuat as $key=>$dx)
                        <tr>
                          <td  class="key">{{$key}}</td>
                          <td>{{$dx->id}}</td>
                          <td>{{$dx->thongTinLoaiDiaDanh->ten_Loai}}</td>
                          <td>{{$dx->thongTinUser->name}}</td>
                          <td>{{$dx->ten_Diem}}</td>
                          <td>{{$dx->ten_Goi_Khac}}</td>
                          <td>{{$dx->mo_Ta}}</td>
                          <td>{{$dx->kinh_Do}}</td>
                          <td>{{$dx->vi_Do}}</td>
                          <td><a href="{{route('admin.formDeXuat',['id'=>$dx->id])}}" style="background-color: #212529;"><i class="fa fa-check"></i></a></td>
                          <td><form onSubmit="return confirm('Bạn chắc là xóa chứ ?')" action="{{route('admin.deletedDeXuat',['id'=>$dx->id])}}" method="POST"  enctype="multipart/form-data"> @csrf  @method('DELETE') <button style="background-color: #212529;" type="submit" ><i style="color:red" class="fa fa-trash-o"></i></button>  </form></td> 
                      
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="">
            {{$dsDeXuat->appends(request()->all())->links() }} <!--appends(request()->all()) khi ma next qua page khac thi cai link tren url se khong bi mat-->
            </div>
            <!-- End Default Dark Table -->
          </div>
          @if (session('notification'))
<div class="alert alert-success" role="alert" id="alert-success" style="
    position: fixed;
    top: 629px;
    left: 23px;
    width: 95%;
    z-index: 9999;
    border-radius: 0px;
    background-color: chartreuse;
    height: 50px;
    font-weight: bold;
    text-align: center;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="
            position: fixed;
          top: 646px;
          left: 804px;
          height: 20px;
          width: 20px;
          background-color: unset;" ><span aria-hidden="true" style="
         position: fixed;
          top: 649px;
          left: 810px;
          font-weight: bold;
          font-size: larger;
    ">&times;</span></button>
      <p>{{ session('notification') }}</p>
</div>
<script>
 window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>
@endif
@endsection