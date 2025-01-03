@extends('layouts.app')
 
@section('title', 'Form products')
 
@section('contents')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

@if($errors-> count())
<ul class="alert alert-warning">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form action="{{route('sanpham.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
              <label for="item_code">File Excel chứa dữ liệu</label>
              <input type="file" class="form-control" id="name" name="file_excel" >
             
              
            </div>

            <div class="form-group">
              <label for="item_code">Các hình ảnh upload</label>
              
              <input type="file" class="form-control" id="name" name="anhs[]" multiple>
              
            </div>

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
    </form>
    @endsection