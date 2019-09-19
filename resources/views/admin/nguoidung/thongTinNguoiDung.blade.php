@extends('admin.layouts.master')
@section('title','dataTables')
@section('header','Data-Tables')
@section('link')
<li><a href="#">Dashboard</a></li>
<li><a href="#">Table</a></li>
<li class="active">Data-tables</li>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Thông tin</strong><small> {{$User->name}}</small></div>
            <div class="card-body card-block">
                <div class="form-group"><label class=" form-control-label">Tên Người Dùng</label><input type="text" name="hoten" value="{{$User->nguoidung->hoten}}" class="form-control"></div>
                <div class="form-group"><label class=" form-control-label">Ngày Sinh</label>
                    <input class="form-control" name="ngaysinh" value="{{ date('d-m-Y', strtotime($User->nguoidung->ngaysinh))}}">
                </div>
                <div class="form-group"><label class=" form-control-label">Địa chỉ</label><input type="text" name="diachi" value="{{$User->nguoidung->diachi}}" class="form-control"></div>
                <div class="form-group"><label class=" form-control-label">Email</label><input type="text" name="email" value="{{$User->email}}" class="form-control"></div>
                <div class="form-group"><label class=" form-control-label">Chức Vụ</label><input type="text" name="chuvu" value="{{$User->nguoidung->chuvu}}" class="form-control"></div>
                <div class="row form-group"></div>
            </div>
        </div>
    </div>
@endsection