
  @extends('layouts.layout_admin')
  @section('css')
  <link rel="stylesheet" href="{{ asset('../styles/css/duyetdexuat.css') }}">
@endsection
  @section('content')

<div class="col-12 grid-margin stretch-card">
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm Địa Danh</h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="{{route('admin.xulyThemDiaDanh')}}" method="POST"  enctype="multipart/form-data" >
                      @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">Loại địa danh</label> 

                        @if ($errors->has('loai_dia_danh_id')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('loai_dia_danh_id') }} </span>
                        @endif

                        <select class="form-control" name="loai_dia_danh_id" id="exampleSelectGender">
                          <option value=''> >--Chọn Loại Địa Danh </option>
                          @foreach($dsLoaiDiaDanh as $LoaiDiaDanh)
                          <option value="{{$LoaiDiaDanh->id}}" >
                            {{$LoaiDiaDanh->ten_Loai}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputName1">Tên địa danh</label>

                        @if ($errors->has('ten_dia_danh')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('ten_dia_danh') }} </span>
                        @endif

                        <input type="text" name="ten_dia_danh" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputName1">Tên Khác</label>
                        <input type="text" name="ten_Goi_Khac" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Kinh độ</label>

                        @if ($errors->has('kinh_Do')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('kinh_Do') }} </span>
                        @endif

                        <input name="kinh_Do" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Vĩ độ</label>

                        @if ($errors->has('vi_Do')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('vi_Do') }} </span>
                        @endif

                        <input name="vi_Do" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Miền</label>

                        @if ($errors->has('mien_id')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('mien_id') }} </span>
                        @endif

                        <select class="form-control" name="mien_id" id="exampleSelectGender">
                          <option value=''> >--Chọn Miền--< </option>
                          @foreach($dsMien as $mien)
                          <option value="{{$mien->id}}" >
                            {{$mien->ten_Mien}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Phân Vùng</label>

                        @if ($errors->has('phan_vung_id')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('phan_vung_id') }} </span>
                        @endif

                        <select class="form-control" name="phan_vung_id" id="exampleSelectGender">
                          <option value=''> >--Chọn Phân Vùng--< </option>
                          @foreach($dsPhanVung as $phanVung)
                          <option value="{{$phanVung->id}}" >
                            {{$phanVung->ten_Vung}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group"></div>

                   
                      <!-- <img id="imgPreview" style="width: 200px; display: none;"  alt=""> -->
                      <div  class="gallery"></div> <!--fix 01-->

                      <div class="form-group">
                        <label>File upload</label>

                        @if ($errors->has('images')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('images') }} </span>
                        @endif

                        <input type="file"  id="gallery-photo-add" name="images[]"  multiple class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                    
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>

                        @if ($errors->has('mo_Ta')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('mo_Ta') }} </span>
                        @endif

                        <textarea name="mo_Ta" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
  </div>

  <script>
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>
  @endsection