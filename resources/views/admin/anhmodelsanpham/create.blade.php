   


@extends('admin/app')
@section('title') Dashboard @endsection
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<section class="recent" style="margin-top: 0px;">
  <div class="activity-card" style="width:1050px">
    <div class="content" style="padding-top: 10px; padding-bottom:0px">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12">
                <div class="form h-100" style="padding-bottom: 0px">
                <h4>Thêm mới loại sản phẩm</h4>
                <form class="mb-5" method="POST" action="{{route('xylythemAMSP')}}" style="margin-left :20px" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Tên mẫu sản phẩm</label>
                            <select class="form-control" name="model_id" id="model_id">
                                @foreach ($dssanpham as $a)
                                <option value="{{$a->id}}">{{$a->model_name}}</option>
                                @endforeach  
                              </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Chọn hình ảnh *</label>
                            <input required  type="file" class="form-control" name="filename[]" id="images" multiple>
                        </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input style="font-size:20px;" type="submit" value="Lưu" class="button type2">
                            <span class="submitting"></span>
                        </div>
                    </div>
                </form>
    
                </div>
            </div>
            </div>
        </div>
    
        </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
{{--jquery.autocomplete.js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
{{--custom css item suggest search--}}
<style>
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    /*.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }*/
    .autocomplete-group { padding: 2px 5px; }
    .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
</style>
@endsection