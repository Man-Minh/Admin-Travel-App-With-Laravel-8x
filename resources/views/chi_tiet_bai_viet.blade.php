<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Chi Tiết Bài Viết</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../styles/css/chitietbaiviet.css') }}">
    <script src="{{ asset('../styles/js/jquery.min.js') }}"></script>
  </head>

  <body>
	
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img style="width: 300px;" src="{{$hinhAnh[0]->img}}" /></div>
						  <!-- <div class="tab-pane" id="pic-2"><img src="#" /></div>
						  <div class="tab-pane" id="pic-3"><img src="#" /></div>
						  <div class="tab-pane" id="pic-4"><img src="#" /></div>
						  <div class="tab-pane" id="pic-5"><img src="#" /></div> -->
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <!-- <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="#" /></a></li> -->
						  <!-- <li><a data-target="#pic-2" data-toggle="tab"><img src="#" alt="Chưa có ảnh" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="#" alt="Chưa có ảnh"  /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="#" alt="Chưa có ảnh"  /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="#" alt="Chưa có ảnh"  /></a></li> -->
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">Tác Giả: {{$chiTiet->thongTinUser->name}} </h3>
						<div class="rating">
							<span style="font-weight: bold;" class="review-no">Ngày Đăng:  </span>
                            <span style="color:blue;" class="review-no">{{$chiTiet->created_at->format('m-d-Y')}} </span>
						</div>
                        <span style="font-weight: bold;" class="review-no">Nội dung: </span>
						<p class="product-description"> {{$chiTiet->noi_Dung}}</p>
						<h4 class="price">Địa danh: <span> {{$chiTiet->thongTinDiaDanh->ten_dia_danh}} </span></h4>
						<h5 class="sizes">Lượt thích:
							<span class="size" data-toggle="tooltip" title="small"> {{$chiTiet->thongTinLuotThich->count()}} </span> <span class="fa fa-heart"></span>
						
						</h5>
						<h5 class="colors">Trạng Thái:
                             @if($chiTiet->status == 1) 
                              <span class="badge badge-success">Bình thường</span>
                              @else
                              <span class="badge badge-danger">Bị khóa</span>
                              @endif
						</h5>
						
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
