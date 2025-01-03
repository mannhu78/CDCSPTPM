@extends('layouts.app')
 
@section('title', 'Form products')
 
@section('contents')
<form action="{{ isset($sanpham) ? route('sanpham.update', $sanpham->id) : route('sanpham.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($sanpham) ? 'Form cập nhật sản phẩm' : 'Form thêm sản phẩm' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="item_code">Tên sản phẩm</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($sanpham) ? $sanpham->name : '' }}">
            </div>
           
            <div class="form-group">
              <label for="item_code">Hình ảnh cho sản phẩm</label>
              <input type="file" class="form-control" id="name" name="images[]" multiple>

              @if(isset($sanpham))
                @foreach($anhs as $anh)
                  <img src="{{asset($anh ->tenanh)}}" width="100px"/>
                  @endforeach
              @endif
            </div>
            
            <div class="form-group">
              <label for="productname">Giá</label>
              <input type="text" class="form-control" id="price" name="price" value="{{ isset($sanpham) ? $sanpham->price : '' }}">
            </div>
            <div class="form-group">
              <label for="id_category">Thuộc danh mục</label>
              <select name="danhmuc_id" id="danhmuc_id" class="custom-select">
                   <option value="" selected disabled hidden>-- Choose Category --</option>
                      @foreach ($danhmucs as $row)
                       <option value="{{ $row->id }}" {{ isset($sanpham) ? ($sanpham->danhmuc_id == $row->id ? 'selected' : '') : '' }}>{{ $row->name }}</option>
                      @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_category">Thương hiệu</label>
              <select name="thuonghieu_id" id="thuonghieu_id" class="custom-select">
                   <option value="" selected disabled hidden>-- Choose Category --</option>
                      @foreach ($thuonghieus as $row)
                       <option value="{{ $row->id }}" {{ isset($sanpham) ? ($sanpham->thuonghieu_id == $row->id ? 'selected' : '') : '' }}>{{ $row->name }}</option>
                      @endforeach
              </select>
            </div>
            <!--mo ta-->
            <div class="form-group">
              <label for="">Mô tả</label>
              <textarea name="description" id="mota" ></textarea> 
              {{ isset($sanpham) ? $sanpham->description : '' }}
            </div>
            <div class="form-group"> 
              <label for="">Nội dung</label>
              <textarea name="content" id="noidung"></textarea>
              {{ isset($sanpham) ? $sanpham->content : '' }}
            </div>
            
             <!--noi dung-->
             
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

@push('scripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

<scrip>
    @include('components.head.tinymce-config') <!-- Đường dẫn đúng tới file tinymce-config.blade.php -->
    @include('components.forms.tinymce-editor')

</scrip>
    
@endpush

