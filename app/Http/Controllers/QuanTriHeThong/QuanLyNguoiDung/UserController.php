<?php

namespace App\Http\Controllers\QuanTriHeThong\QuanLyNguoiDung;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Nhom;
use App\NguoiDungVaNhom;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::all();
        return view('admin.QuanTriHeThong.QuanLyNguoiDung.QuanLyNguoiDung.UsersIndex', ['User' => $User]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 0;
        $Nhom = DB::table('nhoms')
            ->leftJoin('nguoi_dung_va_nhoms', function ($join) use ($id) {
                $join->on('nguoi_dung_va_nhoms.id_nhom', '=', 'nhoms.id')->where('nguoi_dung_va_nhoms.id_user', '=', $id);
            })
            ->select('nhoms.*', 'nguoi_dung_va_nhoms.id_user')
            ->orderBy('nhoms.name')
            ->get();
        $User = new User();
        $User->id = 0;
        return view('admin.QuanTriHeThong.QuanLyNguoiDung.QuanLyNguoiDung.UsersUpdate', ['User' => $User, 'Nhom' => $Nhom]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Nhom = DB::table('nhoms')
            ->leftJoin('nguoi_dung_va_nhoms', function ($join) use ($id) {
                $join->on('nguoi_dung_va_nhoms.id_nhom', '=', 'nhoms.id')->where('nguoi_dung_va_nhoms.id_user', '=', $id);
            })
            ->select('nhoms.*', 'nguoi_dung_va_nhoms.id_user')
            ->orderBy('nhoms.name')
            ->get();
        $actions = DB::table('actions')
            ->leftJoin('actionvausers', function ($join) use ($id) {
                $join->on('actionvausers.id_action', '=', 'actions.id')->where('actionvausers.id_Users', '=', $id);
            })
            ->select('actions.*', 'actionvausers.id_Users','actions.controllerid')
            ->orderBy('actions.ten')
            ->get();
        $controllers = DB::table('controllers')
            ->leftJoin('actions', 'controllers.id', '=', 'actions.controllerid')
            ->leftJoin('actionvausers', function ($join) use ($id) {
                $join->on('actionvausers.id_action', '=', 'actions.id')->where('actionvausers.id_Users', '=', $id);
            })
            ->select('controllers.ten as tencl','controllers.id as id1','actions.controllerid')
            ->distinct()
            ->get();
        $User = User::find($id);
        return view('admin.QuanTriHeThong.QuanLyNguoiDung.QuanLyNguoiDung.UsersUpdate', ['User' => $User, 'Nhom' => $Nhom, 'actions' => $actions,'controllers' => $controllers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($id > 0) {
            $User = User::find($id);
        } else {
            $User = new User();
        }
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required',
                'ngaysinh' => 'required',
                'diachi' => 'required'
            ]

        );
        $User->name = $request->name;
        $User->email = $request->email;
        $User->ngaysinh = $request->ngaysinh;
        $User->diachi = $request->diachi;
        $User->save();
        $id = $User->id;
        NguoiDungVaNhom::deleteByUserid($id);
        $nguoiDungVaNhom = $request->nguoiDungVaNhom;
        foreach ($nguoiDungVaNhom as $itemNguoiVaNhom) {
            $newNguoiDungVaNhom = new NguoiDungVaNhom();
            $newNguoiDungVaNhom->id_user = $id;
            $newNguoiDungVaNhom->id_nhom = $itemNguoiVaNhom;
            $newNguoiDungVaNhom->save();
        }
        return redirect()->route('user.edit', ['id' => $id])->with('thongbao', 'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();
        NguoiDungVaNhom::deleteByUserid($id);
        return redirect()->route('user.index');
    }
}
