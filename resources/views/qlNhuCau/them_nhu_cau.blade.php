
  @extends('layouts.layout_admin')
  @section('content')

<div class="col-12 grid-margin stretch-card">
<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm Nhu Cầu</h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="{{route('admin.xulythemnhucau')}}" method="POST" >
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Tên nhu cầu</label>

                        @if ($errors->has('ten_Loai')) 
                        <span style="color:red" class="error-message"> {{ $errors->first('ten_Loai') }} </span>
                        @endif

                        <input type="text" name="ten_Loai" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
  </div>
  @endsection