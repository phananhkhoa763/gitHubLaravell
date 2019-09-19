<?php

namespace App\Http\Controllers\QuanTriHeThong\QuanLyNhom;
use App\Nhom;
use App\NguoiDungVaNhom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class NhomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Nhom = Nhom::all();
        return view('admin.QuanTriHeThong.QuanLyNhom.QuanLyNhom.NhomIndex', ['Nhom' => $Nhom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nhom  $nhom
     * @return \Illuminate\Http\Response
     */
    public function show(Nhom $nhom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nhom  $nhom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Nhom = Nhom::find($id);
        return view('admin.QuanTriHeThong.QuanLyNhom.QuanLyNhom.NhomUpdate', ['Nhom' => $Nhom]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nhom  $nhom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Nhom = Nhom::find($id);
        $this->validate(
            $request,
            [
                'name' => 'required|min:1|max:100',
                'kichhoat' => 'required',
            ],
            [
                'name.required' => 'bạn chưa nhập tên nhóm',
                'name.min' => 'tên nhóm phải có ít nhất 3 ký tự',
                'name.max' => 'tên nhóm nhiều nhất là nhất 40 ký tự',
                'kichhoat.required' => 'bạn chưa nhập kích hoạt',
            ]
        );
        $Nhom->name = $request->name;
        $Nhom->kichhoat = $request->kichhoat;
        $Nhom->save();
        return redirect()->route('nhom.update', ['id' => $id])->with('thongbao', 'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nhom  $nhom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Nhom = Nhom::find($id);
        $Nhom->delete();
        NguoiDungVaNhom::deleteByNhomid($id);
        return redirect()->route('nhom.index');
    }
}
