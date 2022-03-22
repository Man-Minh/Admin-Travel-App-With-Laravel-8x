


<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Chi Tiết Địa Danh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../styles/css/chitietbaiviet.css') }}">
    <script src="{{ asset('../styles/js/jquery.min.js') }}"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>

  <body>
	
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
			
				<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						@foreach($hinhAnh as $key=>$hinh)
							@if($key == 0)
						  <div class="tab-pane active" id="pic-{{$key}}"><img src="{{$hinh->img}}" /></div>
							@else
						  <div class="tab-pane" id="pic-{{$key}}"><img src="{{$hinh->img}}" /></div>
							  @endif
						  @endforeach
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						@foreach($hinhAnh as $key=>$hinh)
							@if($key == 0)
						<li class="active"><a data-target="#pic-{{$key}}" data-toggle="tab"><img style="height: 90px;width: 90px;" src="{{$hinh->img}}" /></a></li>
						@else
						  <li><a data-target="#pic-{{$key}}" data-toggle="tab"><img style="height: 90px;width: 90px;" src="{{$hinh->img}}" /></a></li>
						  @endif
						@endforeach
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">Tên địa danh: {{$chiTiet->ten_dia_danh}} </h3>
						<div class="rating">
							<span style="font-weight: bold; color: brown;" class="review-no">Ngày tạo:  </span>
                            <span style="color:blue;" class="review-no">{{$chiTiet->created_at->format('m-d-Y')}} </span>
						</div>
                        <span style="font-weight: bold;color: brown;" class="review-no">Nội dung: </span>
						<p class="product-description"> {{$chiTiet->mo_Ta}}</p>
						<h4 class="price">Tên khác: @if($chiTiet->ten_Goi_Khac != null) <span> {{$chiTiet->ten_Goi_Khac}} </span> @else <span> Không có </span>    @endif </h4>
						<h5 class="sizes" style="color: cadetblue;" >Kinh độ - Vĩ độ:
							<span class="size" data-toggle="tooltip" title="small"> {{$chiTiet->kinh_Do}} </span> <span class="fa fa-map-marker"></span>
							<span class="size" data-toggle="tooltip" title="small"> {{$chiTiet->vi_Do}} </span> <span class="fa fa-map-marker"></span>
						</h5>
						<h5 class="sizes" style="color:tomato;" >Nhu cầu:
                              <span style="color:darkblue;" >{{$chiTiet->thongTinLoaiDiaDanh->ten_Loai}}</span>
						</h5>
						<h5 class="sizes" style="color:tomato;" >Miền:
                              <span style="color:darkblue;" >{{$chiTiet->thongTinMien->ten_Mien}}</span>
						</h5>
						<h5 class="sizes" style="color:tomato;">Phân vùng:
                              <span   style="color:darkblue;" >{{$chiTiet->thongTinVung->ten_Vung}} </span>
						</h5> 
					
						<h5 class="colors" style="color:tomato;">Trạng Thái:
                             @if($chiTiet->status == 1) 
                              <span class="badge badge-success">Bình thường</span>
                              @else
                              <span class="badge badge-danger">Tạm đóng</span>
                              @endif
						</h5>
					
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
