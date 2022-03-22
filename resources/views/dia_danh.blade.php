@extends('layouts.layout_admin')
@section('css')
<link rel="stylesheet" href="{{ asset('../styles/css/styleTable.css') }}">
@endsection
@section('content')

<div style=" display: none;" id="id_confrmdiv">confirmation
    <button id="id_truebtn">Yes</button>
    <button id="id_falsebtn">No</button>
</div>


<!-- Page Header -->
<div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Danh Sách Địa Danh</h3>
              </div>
              
            </div>
            <!-- End Page Header -->
            
            <!-- Default Dark Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small overflow-hidden mb-4">
                  <div class="card-header bg-dark" >
        
                    <h6 style="display: inline;"  class="m-0 text-white"><a class="add" href="{{route('admin.themdiadanh')}}"> <i class="fa fa-plus"></i> Thêm địa danh</a>   </h6>
                    
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
                          <th scope="col" class="border-bottom-0">id</th>
                          <th scope="col" class="border-bottom-0">Loại địa danh</th>
                          <th scope="col" class="border-bottom-0">Miền</th>
                          <th scope="col" class="border-bottom-0">Phân vùng</th>
                          <th scope="col" class="border-bottom-0">Tên địa danh</th>
                          <th scope="col" class="border-bottom-0">Quản lý</th>
                          <th scope="col" class="border-bottom-0"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dsDiaDanh as $key=>$dd)
                        <tr>
                          <td class="key">{{$key}}</td>
                          <td>{{$dd->id}}</td>
                          <td>{{$dd->thongTinLoaiDiaDanh->ten_Loai}}</td>
                          <td>{{$dd->thongTinMien->ten_Mien}}</td>
                          <td>{{$dd->thongTinVung->ten_Vung}}</td>
                          <td>{{$dd->ten_dia_danh}}</td>
                         
                          <td style="display: inline-flex;">
                              <form action="{{route('admin.suadiadanh',['id'=>$dd->id] )}}"> @csrf  <button  style="background-color: #212529;font-weight:bold;margin-right: 15px;" type="submit" ><i class="fa fa-edit"></i></button>   </form> 
                              <form action="{{route('admin.showChiTietDiaDanh',['id'=>$dd->id] )}}"style="margin-right: 15px" > @csrf   <button  style="background-color: #212529;font-weight:bold" type="submit" ><i  class="fa fa-book"></i></button>  </form>
                              <form onSubmit="return confirm('Bạn chắc là xóa chứ ?')" action="{{route('admin.deletedDiaDanh',['id'=>$dd->id])}}" method="POST" >  @csrf  @method('DELETE') <button style="background-color: #212529;font-weight:bold" type="submit"><i style="color:red" class="fa fa-trash-o"></i></button>  </form>
                            </td> 
                          <td><a class="link"  href="{{route('admin.hinhdiadanh',['id'=>$dd->id])}}">Quản lý ảnh</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="">
            {{ $dsDiaDanh->appends(request()->all())->links() }} <!--appends(request()->all()) khi ma next qua page khac thi cai link tren url se khong bi mat-->
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