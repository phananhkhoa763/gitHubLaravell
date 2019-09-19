@extends('admin.layouts.master')
@section('title','dataTables')
@section('header','Data-Tables')
@section('link')
<li><a href="#">Dashboard</a></li>
<li><a href="#">Table</a></li>
<li class="active">Data-tables</li>
@endsection
@section('content')
@if(count($errors)>0)
@foreach($errors->all() as $err)
{{$err}}<br>
@endforeach
@endif
@if(session('thongbao'))
{{session('thongbao')}}
@endif
<form action="{{route('nhom.update', ['id' => $Nhom->id])}}" method="POST">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Updata</strong><small>Thông tin nhóm:{{$Nhom->name}}</small></div>
            <div class="card-body card-block">
                <div class="form-group"><label class=" form-control-label">Tên nhóm</label><input type="text" name="name" placeholder="Chưa có thông tin" value="{{$Nhom->name}}" class="form-control"></div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Kích hoạt</label></div>
                    <div class="col-12 col-md-9">
                        <select name="kichhoat"  class="form-control">
                            <option value="">Please select</option>
                            <option value="0">Không</option>
                            <option value="1">Có</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group"></div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> update
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
</form>
@endsection