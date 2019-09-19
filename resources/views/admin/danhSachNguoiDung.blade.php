@extends('admin.layouts.master')
@section('title','dataTables')
@section('header','Data-Tables')
@section('link')
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Table</a></li>
    <li class="active">Data-tables</li>
@endsection
@section('content')
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ và Tên</th>
                                            <th>Ngày Sinh</th>
                                            <th>Địa Chỉ</th>
                                            <th>Chức Vụ</th>
                                            <th>email</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=0;
                                     @endphp
                                    @foreach($nguoidung as $k)
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>{{$k->hoten}}</td>
                                            <td>{{$k->ngaysinh}}</td>
                                            <td>{{$k->diachi}}</td>
                                            <td>{{$k->chuvu}}</td>
                                            <td>{{$k->email}}</td>
                                            <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Primary </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 33px, 0px);">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider"></div>
                                                    </div>
                                                </div>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
@endsection