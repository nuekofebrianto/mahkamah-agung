<?php

namespace Add\Controllers;

use Illuminate\Http\Request;
use Add\Models\Menu;
use Add\Models\Role;
use DB;


class MenuMasterController extends Controller
{
    public function index()
    {
        $basicInfo = getBasicInfo('/menu');

        if ($basicInfo['infoUser']->id != '1') {
            return view('home.404', compact('basicInfo'));
        }

        $db_name     = DB::getDatabaseName();
        $db_name     = 'Tables_in_' . $db_name;
        $tables     = DB::select('SHOW TABLES');

        $role = Role::where("is_deleted", 0)
            ->where('id', '>', '1')
            ->orderBy("created_at", "desc")
            ->get();


        return view('menu.index', compact('basicInfo', 'tables', 'db_name', 'role'));
    }

    public function list()
    {
        $list = Menu::where('tipe', 'master')->whereNotIn('url', ['/menu', '/home', '/role', '/user'])->orderBy("created_at", "asc")->get();
        return DataTables()->of($list)->make(true);
    }

    public function getColumn(Request $request)
    {
        $column_list = DB::select("show columns from " . $request->table_name . " where field not in ('id','created_by','updated_by','is_deleted','created_at','updated_at')");
        return response()->json($column_list);
    }

    public function store(Request $request)
    {
       
        $response = ['mangga mamam'];

        return response()->json($response);
    }

    public function destroy(Request $request)
    {
        $id = $request->ids[0];
        $sidebar = $request->sidebar;
        $delete = Menu::where('id', $id)
            ->with('menu_detail')
            ->with('menu_migration')
            ->with('menu_kolom')
            ->first();

        $deleteMenu = deleteMenu($delete,$sidebar);

        return response()->json($delete);
    }
}
