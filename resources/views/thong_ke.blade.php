
@extends('layouts.layout_admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
@section('content')
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
              <span class="text-uppercase page-subtitle">Dashboard</span>
              <h3 class="page-title">Blog Overview</h3>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Small Stats Blocks -->
          <div class="row">
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Bài viết</span>
                      <h6 class="stats-small__value count my-3">{{$baiViet}}</h6>
                    </div>
                    <div class="stats-small__data">
                      <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                    </div>
                  </div>
                  <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Địa Danh</span>
                      <h6 class="stats-small__value count my-3">{{$diaDanh}}</h6>
                    </div>
                    <div class="stats-small__data">
                      <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                    </div>
                  </div>
                  <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-4 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Loại Địa Danh</span>
                      <h6 class="stats-small__value count my-3">{{$loaiDiaDanh}}</h6>
                    </div>
                    <div class="stats-small__data">
                      <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                    </div>
                  </div>
                  <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-4 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Tài khoản</span>
                      <h6 class="stats-small__value count my-3">{{$taiKhoan}}</h6>
                    </div>
                    <div class="stats-small__data">
                      <span class="stats-small__percentage stats-small__percentage--increase"></span>
                    </div>
                  </div>
                  <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-4 col-sm-12 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Đề xuất</span>
                      <h6 class="stats-small__value count my-3">{{$taiKhoan}}</h6>
                    </div>
                    <div class="stats-small__data">
                      <span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span>
                    </div>
                  </div>
                  <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                </div>
              </div>
            </div>
          </div>
          
          <!-- End Small Stats Blocks -->
          <div class="row">
            <!-- Users Stats -->
            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
              <div class="card card-small h-100">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Số địa danh theo miền</h6>
                </div>
                <div class="card-body d-flex py-0">
                <canvas id="myChart2" width="500" height="400"></canvas>
                </div>
                <div class="card-footer border-top">
                  <div class="row">
                    <div class="col">
                      <select class="custom-select custom-select-sm" style="max-width: 130px;">
                        <option selected>Last Week</option>
                        <option value="1">Today</option>
                        <option value="2">Last Month</option>
                        <option value="3">Last Year</option>
                      </select>
                    </div>
                    <div class="col text-right view-report">
                      <a href="#">Full report &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Users Stats -->
            <!-- Users By Device Stats -->
            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
              <div class="card card-small h-100">
                <div class="card-header border-bottom">
                  <h6 class="m-0"> Số địa danh theo loại </h6>
                </div>
                <div class="card-body d-flex py-0">
                <canvas id="myChart" width="500" height="400"></canvas>
                </div>
                <div class="card-footer border-top">
                  <div class="row">
                    <div class="col">
                      <select class="custom-select custom-select-sm" style="max-width: 130px;">
                        <option selected>Last Week</option>
                        <option value="1">Today</option>
                        <option value="2">Last Month</option>
                        <option value="3">Last Year</option>
                      </select>
                    </div>
                    <div class="col text-right view-report">
                      <a href="#">Full report &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Users By Device Stats -->
            <!-- New Draft Component -->
           
                </div>
              </div>
            </div>
            <!-- End Top Referrals Component -->
          </div>

          

          <div class="row">
            <!-- Users Stats -->
         
            <!-- End Users Stats -->
            <!-- Users By Device Stats -->
            <div class="col-lg-12 col-md-12 col-sm-12 mb-12">
       
            <div style="width: 79%; margin-left: 19%;"  class="card card-small h-100">
                <div class="card-header border-bottom">
                  <h6 class="m-0">Thống kê số bài viết theo ngày</h6>
                </div>
                <div class="card-body d-flex py-0">
             
                
                <span style="margin-right: 5px; margin-top: 26px;" >  Từ ngày: </span>
                <form action="" class="form-inline" style="margin-top: 10px;" method="get">
                  <div class="form-group mb-2;">
                    

                    <label for="staticEmail2" class="sr-only">Ngày bắt đầu</label>
                    <input name="start" type="date" class="form-control" id="staticEmail2" >
                  </div>
                  <div class="form-group mx-sm-3 mb-2">
                  
                  <label for="staticEmail2" class="sr-only">Ngày kết thúc</label>
                  <span style="margin-right: 11px; margin-top: 9px;" >  Đến ngày: </span>
                    <input name="end" style="margin-top: 10px;" type="date" class="form-control" id="inputPassword2" >
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Thống kê</button>
                </form>
                <span style="margin-left: 20px; margin-top: 22px;" >  Tổng bài viết: </span>
                <span style="margin-left: 30px; margin-top: 22px;" > @if(@tkBaiViet == '0') {{$tkBaiViet->count()}} @endif </span>
                                </div>
                <div class="card-footer border-top">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Địa danh</th>
                        <th scope="col">Nội dung</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(@tkBaiViet == '0')
                    @foreach($tkBaiViet as $key=>$bv)
                      <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$bv->created_at->format('d-m-Y')}}</td>
                        <td>{{$bv->thongTinUser->name}}</td>
                        <td>{{$bv->thongTinDiaDanh->ten_dia_danh}}</td>
                        <td>{{$bv->noi_Dung}}</td>
                      </tr>
                    @endforeach
                    @endif
                    </tbody>
                  </table>
               
                </div>
              </div>
            </div>

            </div>
            <!-- End Users By Device Stats -->
            <!-- New Draft Component -->
           
                </div>
              </div>
            </div>
            <!-- End Top Referrals Component -->
       
        </div>
        @php
    $ran1 = rand(110, 255);
    $ran2 = mt_rand(15, 240);
    $ran3 = rand(120, 255);
    $ran4 = rand(120, 255);
      @endphp
    

        <script>

const ctx = document.getElementById('myChart').getContext('2d');
const fruits = [];
const numbers = [];
@foreach($allLoai as $loai)
fruits.push( "{{$loai->ten_Loai}}" );
@endforeach

@foreach($allLoai as $loai)
numbers.push( "{{$loai->diaDanh->count()}}" );
@endforeach

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: fruits,
        datasets: [{
            label: '# of Votes',
            data: numbers,
            @foreach($allLoai as $key=>$loai)
            backgroundColor: [
                'rgba( {{$ran1}} ,{{$ran2}} , 132, 0.2)',
            ],
            borderColor: [
                'rgba( {{$ran1}} ,{{$ran2}}, 132, 1)',
            ],
            @endforeach   
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const mien = [];
@foreach($allMien as $mien)
mien.push( "{{$mien->ten_Mien}}" );
@endforeach
const numbersMien = [];
@foreach($allMien as $mien)
numbersMien.push( "{{$mien->thongTinDiaDanh->count()}}" );
@endforeach


const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
  type: 'doughnut',
    data: {
        labels: mien,
        datasets: [{
            label: '# of Votes',
            data: numbersMien,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            hoverOffset: 4
        }]
    }
    
});
</script>
@endsection

