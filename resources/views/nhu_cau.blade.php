

@extends('layouts.layout_admin')
@section('css')
<link rel="stylesheet" href="{{ asset('../styles/css/styleTable.css') }}">
@endsection
@section('content')
<!-- Page Header -->

            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Danh Sách Nhu Cầu</h3>
              </div>
            </div>
            <!-- End Page Header -->
            
            <!-- Default Dark Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small overflow-hidden mb-4">
                  <div class="card-header bg-dark">
                  <h6 style="display: inline;" class="m-0 text-white"><a class="add" href="{{route('admin.showThemNhuCau')}}"> <i class="fa fa-plus"></i> Thêm Nhu Cầu</a></h6>

                  <div class="dropdown" style="display: inline;" > 
                      <button style="position: absolute; left: 789px; top: -7px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Dropdown button -->
                      <i class="fas fa-filter"></i>
                      </button>
                   
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <form action="" > <button class="dropdown-item" type="submit" ><input type="hiden" style="display:none" name="keyfilterDesc" value="ten_Loai" > Tên Z-A</button> </form>
                      <form action="" >   <button class="dropdown-item" type="submit" ><input type="hiden"style="display:none"  name="keyfilter"  value="ten_Loai" > Tên A-Z </button> </form>
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
                          <th scope="col" class="border-bottom-0">ID Nhu Cầu</th>
                          <th scope="col" class="border-bottom-0">Tên nhu cầu</th>
                          <th scope="col" class="border-bottom-0">Số lượng địa danh</th>
                          <th scope="col" class="border-bottom-0">Ngày tạo</th>
                          <th scope="col" class="border-bottom-0">Cập nhật</th>
                          <th scope="col" class="border-bottom-0">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dsNhuCau as $key=>$nhuCau)
                        <tr>
                          <td class="key" >{{$key}}</td>
                          <td>{{$nhuCau->id}}</td>
                          <td>{{$nhuCau->ten_Loai}}</td>
                          <td>{{$nhuCau->diaDanh->count()}}</td>
                          <td>{{$nhuCau->created_at->format('m-d-Y')}}</td>
                          <td><a href="{{route('admin.showSuaNhuCau',['id'=>$nhuCau->id])}}" style="background-color: #212529;"><i class="fas fa-edit" ></i></a></td>
                          <td><form onSubmit="return confirm('Bạn chắc là xóa chứ ?')" action="{{route('admin.deletednhucau',['id'=>$nhuCau->id])}}" method="POST"  enctype="multipart/form-data"> @csrf  @method('DELETE') <button style="background-color: #212529;font-weight:bold" type="submit" ><i style="color:red" class="fa fa-trash-o"></i></button>  </form></td> 
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="">
            {{ $dsNhuCau->appends(request()->all())->links() }} <!--appends(request()->all()) khi ma next qua page khac thi cai link tren url se khong bi mat-->
            </div>
            <!-- End Default Dark Table -->
          </div>
@endsection