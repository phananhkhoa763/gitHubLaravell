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
<form action="/nguoiDung/edit/{{$nguoidung->User->id}}" method="POST">
    <div class="col-lg-12">
        <input type=hidden value="{{csrf_token()}}" name="_token">
        <div class="card">
            <div class="card-header"><strong>Updata</strong><small>Thông tin người dùng</small></div>
            <div class="card-body card-block">
                <div class="form-group"><label class=" form-control-label">Tên Người Dùng</label><input type="text" name="hoten" placeholder="Chưa có thông tin" value="" class="form-control"></div>
                <div class="form-group"><label class=" form-control-label" >Ngày Sinh</label>
                    <input class="form-control" name="ngaysinh" value="" placeholder="Chưa có thông tin" type="date">
                </div>
                <div class="form-group"><label class=" form-control-label">Địa chỉ</label><input type="text" name="diachi" placeholder="Chưa có thông tin" value="" class="form-control"></div>
                <div class="form-group"><label class=" form-control-label">Chức Vụ</label><input type="text" name="chuvu" placeholder="Chưa có thông tin" value="" class="form-control"></div>
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