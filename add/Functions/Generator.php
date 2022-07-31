<?php

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use Add\Models\User;
use Add\Models\Role;
use Add\Models\RoleAkses;
use Add\Models\Menu;
use Add\Models\MenuDetail;
use Add\Models\MenuKolom;
use Add\Models\MenuMigration;

function createController($data)
{
    $headerData = $data['headerData'];
    $detailData = $data['detailData'];

    $namaKecil = $headerData['namaKecil'];
    $namaBesar = $headerData['namaBesar'];

    $table = '$table';
    $fileName = $namaBesar . 'Controller.php';
    $targetPath = public_path() . '/../add/Controllers/';


    $template1 =
        "<?php
    
    namespace Add\Controllers;
    
    use Illuminate\Http\Request;
    use DB;
    use Session;
    use Illuminate\Support\Facades\Auth;
    use DataTables;
    
    use Add\Requests\\" . $namaBesar . "Request;
    
    use Add\Models\\" . $namaBesar . ";" . "\r\n";

    $addModel = "";
    $addWith = "";
    $template2 =
        "class " . $namaBesar . "Controller extends Controller
    {" . "\r\n" . "\r\n";


    $compact = "compact('basicInfo'";
    $dataRelasi = "";

    foreach ($detailData as $key => $value) {
        if ($value['tipe'] == 'relasi') {
            $dataRelasi = $dataRelasi.'$';
            $compact = $compact . ",'" . $value['nama'] . "'";
            $dataRelasi = $dataRelasi . $value['nama'] . " = " . $value['nama_besar'] . "::where('is_deleted',0)
            ->orderBy('" . $value['default'] . "','asc')
            ->get();";
            $addModel = $addModel . "use Add\Models\\" . $value['nama_besar'] . ";" . "\r\n";
            $addWith = $addWith . "->with('" . $value['nama'] . "')" . "\r\n";
        }
    }

    $compact = $compact . ")";
    $addModel = $addModel . "\r\n";

    $templateIndex =
        'public function index()
	{
		$basicInfo = getBasicInfo("/' . $namaKecil . '");
        ' . $dataRelasi . '
		return view("' . $namaKecil . '.index", ' . $compact . ');
	}' . "\r\n" . "\r\n";

    $templateList =
        'public function list(Request $request)
	{
		$list = ' . $namaBesar . '::where("is_deleted", 0)
        ->orderBy("created_at", "desc")' . "\r\n"
        . $addWith .
        '->get();
		return DataTables()->of($list)->make(true);
	}' . "\r\n" . "\r\n";

    $templateStore =
        'public function store(' . $namaBesar . 'Request $request)
	{

		$postData = $request->all();
		$user_id = Auth::id();
		$postData["created_by"] = $user_id;
		$store = ' . $namaBesar . '::create($postData);

		return response()->json($store);
	}' . "\r\n" . "\r\n";

    $templateUpdate =
        'public function update(' . $namaBesar . 'Request $request)
	{
		$postData = $request->all();
		$user_id = Auth::id();
		$postData["updated_by"] = $user_id;
		$store = ' . $namaBesar . '::where("id", $request->id)->update($postData);

		return response()->json($store);
	}' . "\r\n" . "\r\n";

    $templateDelete =
        'public function destroy(Request $request)
	{
		$id = $request->ids[0];
		$deleted_by = Auth::id();
		$delete = ' . $namaBesar . '::whereIn("id", request("ids"))->update(["is_deleted" => 1, "updated_by" => $deleted_by]);
		return response()->json($delete);
	}' . "\r\n" . "\r\n";

    $templateGetData =
        'public function getData(Request $request)
	{
		$datas = ' . $namaBesar . '::where("id", $request->id)
        ->where("is_deleted", 0)' . "\r\n"
        . $addWith .
        '->first();
		return response()->json($datas);
	}' . "\r\n" . "\r\n";


    $template = $template1 . $addModel . $template2 . $templateIndex . $templateList . $templateStore . $templateUpdate . $templateDelete . $templateGetData . "}";

    File::put($targetPath . $fileName, $template);

    return 'create Controller Success';
}

function createMigration($data)
{
    $headerData = $data['headerData'];
    $detailData = $data['detailData'];

    $namaKecil = $headerData['namaKecil'];
    $namaBesar = $headerData['namaBesar'];

    $table = '$table';
    $fileName = date("Y_m_d") . '_100';
    $targetPath = public_path() . '/../database/migrations/';
    $files = glob($targetPath . '*.php');
    $filecount = count($files);
    $urutan = '';
    if ($filecount < 100) {
        $urutan = '0' . $filecount;
    }
    if ($filecount < 10) {
        $urutan = '00' . $filecount;
    }
    $fileName = $fileName . $urutan . '_create_' . $namaKecil . '_table';



    $template1 =
        "<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;
    
    class Create" . $namaBesar . "Table extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('" . $namaKecil . "', function (Blueprint $" . "table) {
                $" . "table->bigIncrements('id');" . "\r\n";
    $template2 = '';
    $template3 =

        "$" . "table->Integer('created_by')->nullable();
                $" . "table->Integer('updated_by')->nullable();
                $" . "table->Integer('is_deleted')->nullable()->default(0);
                $" . "table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $" . "table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            });
        }
    
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('" . $namaKecil . "');
        }
    }";

    $migrationsColumn = '';
    $checkColumn = array();
    $sameColumn = 0;

    $setColumn = '';



    foreach ($detailData as $key2 => $value2) {

        $nullable = '';
        $tipe = '';
        $default = '';

        if ($value2['default'] != '') {
            $default = "->default('" . $value2['default'] . "')";
        } else {
            $default = '->nullable()';
        }

        if ($value2['tipe'] == 'relasi') {
            if (!in_array($value2['nama'], $checkColumn, true)) {
                $tipe = "->integer('" . $value2['nama'] . "_id')";
            } else {
                $sameColumn = $sameColumn + 1;
                $tipe = "->integer('" . $value2['nama'] . "_" . $sameColumn . "_id')";
            }
            array_push($checkColumn, $value2['nama']);
            $default = '';
        } else if ($value2['tipe'] == 'text') {
            $tipe = "->string('" . $value2['nama'] . "')";
        } else if ($value2['tipe'] == 'numeric') {
            $tipe = "->bigInteger('" . $value2['nama'] . "')";
        } else if ($value2['tipe'] == 'decimal') {
            if ($value2['coma'] > 0) {
                $tipe = "->float('" . $value2['nama'] . "',20," . $value2['coma'] . ")";
            } else {
                $tipe = "->bigInteger('" . $value2['nama'] . "')";
            }
        } else if ($value2['tipe'] == 'date') {
            $tipe = "->date('" . $value2['nama'] . "')";
        } else if ($value2['tipe'] == 'datetime') {
            $tipe = "->datetime('" . $value2['nama'] . "')";
        } else if ($value2['tipe'] == 'time') {
            $tipe = "->time('" . $value2['nama'] . "')";
        } else if ($value2['tipe'] == 'area') {
            $tipe = "->longText('" . $value2['nama'] . "')";
        }

        $setColumn = $setColumn . $table . $tipe . $default . $nullable . ";" . "\r\n";
    }



    $template = $template1 . $setColumn . $template3;

    File::put($targetPath . $fileName . '.php', $template);

    $migrationFileName = $fileName . '.php';

    return $migrationFileName;
}

function createModel($data)
{
    $headerData = $data['headerData'];
    $detailData = $data['detailData'];

    $namaKecil = $headerData['namaKecil'];
    $namaBesar = $headerData['namaBesar'];

    $table = '$table';
    $fileName = $namaBesar . '.php';
    $targetPath = public_path() . '/../add/Models/';

    $fillable = '$fillable';
    $hasOne = '$this->hasOne';
    $belongsTo = '$this->belongsTo';
    $hasMany = '$this->hasMany';
    $createdBy = "'created_by'";


    $template1 =
        "<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class " . $namaBesar . " extends Model 
    { 
    
        protected " . $table . "='" . $namaKecil . "'; 
        protected " . $fillable . "=[
            ";

    $template2 = "";
    $template3 =
        "];
    
        public static function getTableName() { return (new self())->getTable();} 
            ";
    $template4 = "";
    $template5 =
        "    
    } ";

    $setColumn = "";
    $setRelasi = "";
    $relasi = [];

    foreach ($detailData as $key2 => $value2) {


        if ($value2['tipe'] == 'relasi') {
            $setColumn = "'" . $value2['nama'] . "_id',";
            $setRelasi = "public function " . $value2['nama'] . "() {
                return " . $belongsTo . "(" . $value2['nama_besar'] . "::class, '" . $value2['nama'] . "_id')->orderBy('id', 'asc');
            }";
            $template4 = $template4 . $setRelasi;
            array_push($relasi, $value2['nama_besar']);
        } else {
            $setColumn = "'" . $value2['nama'] . "',";
        }

        $template2 = $template2 . $setColumn;
    }

    $template2 = $template2 . $createdBy;
    $template = $template1 . $template2 . $template3 . $template4 . $template5;

    File::put($targetPath . $fileName, $template);

    // $add_contents = "";

    // foreach ($relasi as  $value) {

    //     $contents = rtrim(file_get_contents($targetPath . $value . '.php'));
    //     $old_contents = substr_replace($contents, "", -1);
    //     $add_contents = 
    //         "public function " . $namaKecil . "() {
    //         return " . $hasMany . "(" . $namaBesar . "::class, '" . $namaKecil . "_id')->orderBy('id', 'asc');
    //     }";
    //     $new_contents = $old_contents . $add_contents . "}";

    //     File::put($targetPath . $value. '.php', $new_contents);
    // }



    return 'create Model Success';
}

function createValidasi($data)
{
    $headerData = $data['headerData'];
    $detailData = $data['detailData'];

    $namaKecil = $headerData['namaKecil'];
    $namaBesar = $headerData['namaBesar'];

    $table = '$table';
    $fileName = $namaBesar . 'Request.php';
    $targetPath = public_path() . '/../add/Requests/';

    $method = '$this->method';

    $template1 =
        '<?php

    namespace Add\Requests;
    use Illuminate\Foundation\Http\FormRequest;
    class ' . $namaBesar . 'Request extends FormRequest
    {
    
        public function authorize()
        {
            return true;
        }
    
        public function rules()
        { 
            if($this->method() == "POST"){
        return [' . "\r\n";
    $template2 = "";
    $template3 =
        '];}' . "\r\n" . 'else{
    return [' . "\r\n";
    $template4 = "";
    $template5 =
        '];' . "\r\n" . '}}' . "\r\n";
    $template5_2 =
        'public function messages()' . "\r\n";
    $template5_3 =
        '{
        return [' . "\r\n";
    $template6      = "";
    $template7      = '];' . "\r\n";
    $template7_2    = '}' . "\r\n";
    $template7_3    = '}' . "\r\n" . "\r\n";

    $rule = "";
    $rulePut = $rule;
    $message = "";
    $execpt = '.$this->request->get("id"),';

    foreach ($detailData as $key => $value) {
        $rule = "'" . $value['nama'] . "'=> '";

        if ($value['tipe'] == 'relasi') {
            $rule = "'" . $value['nama'] . "_id'=> '";
            $rule = $rule . "Integer";
            $message = $message . '"' . $value['nama'] . '_id.Integer" => "' . $value['nama'] . ' harus berupa angka !",' . "\r\n";
        } else if ($value['tipe'] == 'text' || $value['tipe'] == 'area') {
            $rule = $rule . "String";
            $message = $message . '"' . $value['nama'] . '.String" => "' . $value['nama'] . ' harus berupa text !",' . "\r\n";
        } else if ($value['tipe'] == 'numeric' || $value['tipe'] == 'decimal') {
            $rule = $rule . "Integer";
            $message = $message . '"' . $value['nama'] . '.Integer" => "' . $value['nama'] . ' harus berupa angka !",' . "\r\n";
        } else if ($value['tipe'] == 'date' || $value['tipe'] == 'time' || $value['tipe'] == 'datetime') {
            if ($value['required'] == true) {
                $rule = $rule . "Date";
                $message = $message . '"' . $value['nama'] . '.Date" => "' . $value['nama'] . ' harus berupa angka !",' . "\r\n";
            }
        }

        if ($value['required'] == 'true') {
            $rule = $rule . "|required";
            $message = $message . '"' . $value['nama'] . '.required" => "' . $value['nama'] . ' tidak boleh kosong !",' . "\r\n";
        }
        if ($value['min'] > 0) {
            $rule = $rule . "|min:" . $value['min'];
            $message = $message . '"' . $value['nama'] . '.min" => "' . $value['nama'] . ' setidaknya ' . $value['min'] . ' karakter !",' . "\r\n";
        }
        if ($value['max'] > 0) {
            $rule = $rule . "|max:" . $value['max'];
            $message = $message . '"' . $value['nama'] . '.max" => "' . $value['nama'] . ' maksimal ' . $value['max'] . ' karakter !",' . "\r\n";
        }

        $rulePut = $rule;

        if ($value['unique'] == 'true') {
            $rule = $rule . "|unique:" . $namaKecil . "," . $value['nama'];
            $rulePut = $rule . ",'" . $execpt . "\r\n";
            $message = $message . '"' . $value['nama'] . '.unique" => "' . $value['nama'] . ' sudah digunakan !",' . "\r\n";
        } else {
            $rulePut = $rulePut . "'," . "\r\n";
        }

        $rule = $rule . "'," . "\r\n";
        $template2 = $template2 . $rule;
        $template4 = $template4 . $rulePut;
    }

    $template6 = $message . "\r\n";

    $template = $template1 . $template2 . $template3 . $template4 . $template5 . $template5_2 . $template5_3 . $template6 . $template7 . $template7_2 . $template7_3;

    File::put($targetPath . $fileName, $template);

    return 'create Request Success';
}

function createSeeder($data, $migrationFileName)
{
    $headerData = $data['headerData'];
    $detailData = $data['detailData'];

    $namaKecil = $headerData['namaKecil'];
    $namaBesar = $headerData['namaBesar'];
    $nama = $headerData['nama'];
    $tipe = $headerData['tipe'];

    $table = '$table';
    $fileName = $namaBesar . 'Controller.php';
    $targetPath = public_path() . '/../database/seeders/';
    $targetPathDatabaseSeeder = public_path() . '/../database/seeders/DatabaseSeeder.php';

    $contents = rtrim(file_get_contents($targetPathDatabaseSeeder));
    $old_contents = "use Database\Seeders\MenuSeeder;";
    $add_contents = "use Database\Seeders\MenuSeeder;" . "\r\n" . "use Database\Seeders\\" . $namaBesar . "Seeder;";
    $new_contents = str_replace($old_contents, $add_contents, $contents);

    $old_contents = "MenuSeeder::class,";
    $add_contents = "MenuSeeder::class," . "\r\n" . $namaBesar . "Seeder::class,";
    $new_contents = str_replace($old_contents, $add_contents, $new_contents);

    File::put($targetPathDatabaseSeeder, $new_contents);

    $add_contents =
        ' $id = DB::table("menu")->insertGetId([
        "url" => "/' . $namaKecil . '",
        "nama" => "' . $nama . '",
        "tipe" => "' . $tipe . '",
        "nama_kecil" => "' . $namaKecil . '",
        "nama_besar" => "' . $namaBesar . '",
      ]);
  
      DB::table("menu_migration")->insert([
        "menu_id" => $id,
        "nama" => "' . $migrationFileName . '",
      ]);' . "\r\n";


    foreach ($detailData as $key => $value) {
        $add_contents = $add_contents .
            'DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "' . $value['tipe'] . '",
            "nama" => "' . $value['nama'] . '",
            "default" => "' . $value['default'] . '",
            "coma" => "' . $value['coma'] . '",
            "required" => "' . $value['required'] . '",
            "unique" => "' . $value['unique'] . '",
            "min" => "' . $value['min'] . '",
            "max" => "' . $value['max'] . '",
          ]);' . "\r\n";
    }


    $template =
        '<?php

    namespace Database\Seeders;
    
    use Illuminate\Database\Seeder;
    use DB;
    
    class ' . $namaBesar . 'Seeder extends Seeder
    {
    
      public function run()
      {
        ' . $add_contents . '
      }
    }';

    File::put($targetPath . $namaBesar . 'Seeder.php', $template);

    Artisan::call('migrate');
    Artisan::call('db:seed --class=' . $namaBesar . 'Seeder');

    return 'create Seeder Success';
}

function createView($data)
{
    $headerData         = $data['headerData'];
    $detailData         = $data['detailData'];

    $namaKecil          = $headerData['namaKecil'];
    $namaBesar          = $headerData['namaBesar'];
    $nama               = $headerData['nama'];
    $tipe               = $headerData['tipe'];

    $fileNameIndex      = 'index.blade.php';
    $fileNameForm       = 'form.blade.php';
    $fileNameDt         = 'js_dt.blade.php';
    $fileNameCrud       = 'js_crud.blade.php';
    $fileNameCustom     = 'js_custom.blade.php';
    $jsPath             = public_path() . '/../add/Views/js';

    $addColumn          = '';
    $addForm            = '';
    $addColumnPush      = '';

    foreach ($detailData as $key => $value) {
        $label = str_replace('_', ' ', $value['nama']);
        $label = ucfirst($label);

        $addColumn = $addColumn . '<td>' . $label . '</td>' . "\r\n";

        if ($value['tipe'] == 'relasi') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <select class="form-control select2" store="' . $value['nama'] . '_id">
                        @foreach ($' . $value['nama'] . ' as $value)
                            <option value="{{ $value->id }}">{{ $value->' . $value['default'] . ' }}</option>
                        @endforeach
                    </select>
                </div>
                </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    data: '" . $value['nama'] . "." . $value['default'] . "',
                    name: '" . $value['nama'] . "." . $value['default'] . "',
                    label: '" . $label . "'
                })" . "\r\n";
        } else if ($value['tipe'] == 'text') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <input type="text" class="form-control" store="' . $value['nama'] . '">
                </div>
            </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    data: '" . $value['nama'] . "',
                    name: '" . $value['nama'] . "',
                    label: '" . $label . "'
                })" . "\r\n";
        } else if ($value['tipe'] == 'numeric') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <input type="text" class="form-control money" store="' . $value['nama'] . '">
                </div>
            </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    id: null,
                    'render': function(data, type, full, meta) {
                        if (full." . $value['nama'] . " == null) {
                            return ''
                        } else {
                            return addCommas(full." . $value['nama'] . ")
                        };
                    }
                });" . "\r\n";
        } else if ($value['tipe'] == 'decimal') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <input type="text" class="form-control decimal" store="' . $value['nama'] . '">
                </div>
            </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    id: null,
                    'render': function(data, type, full, meta) {
                        if (full." . $value['nama'] . " == null) {
                            return ''
                        } else {
                            return addCommas(full." . $value['nama'] . ")
                        };
                    }
                });" . "\r\n";
        } else if ($value['tipe'] == 'date') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <input type="text" class="form-control datepicker" store="' . $value['nama'] . '">
                </div>
            </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    id: null,
                    'render': function(data, type, full, meta) {
                        return moment(full." . $value['nama'] . ").format('DD MMM yyyy');
                    }
                });" . "\r\n";
        } else if ($value['tipe'] == 'time') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <input type="text" class="form-control timepicker" store="' . $value['nama'] . '">
                </div>
            </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    id: null,
                    'render': function(data, type, full, meta) {
                        return moment(full." . $value['nama'] . ").format('h:mm');
                    }
                });" . "\r\n";
        } else if ($value['tipe'] == 'datetime') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <input type="text" class="form-control datetimepicker" store="' . $value['nama'] . '">
                </div>
            </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    id: null,
                    'render': function(data, type, full, meta) {
                        return moment(full." . $value['nama'] . ").format('DD MMM yyyy , h:mm');
                    }
                });" . "\r\n";
        } else if ($value['tipe'] == 'area') {
            $addForm = $addForm .
                '<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">' . $label . '</label>
                    <textarea rows="10" cols="30"  class="form-control" store="' . $value['nama'] . '"></textarea>
                </div>
            </div>' . "\r\n";

            $addColumnPush = $addColumnPush .
                "dataColum.push({
                    data: '" . $value['nama'] . "',
                    name: '" . $value['nama'] . "',
                    label: '" . $label . "'
                })" . "\r\n";
        }
    }


    $templateIndex1 =
        '@extends("base.app")
    @section("main")
    <div class="card h-100 card-index">
        <div class="card-header d-flex align-items-center border-0">
            <div class="me-auto">
                <h3 class="h4 m-0">List</h3>
            </div>
            <div class="toolbar-end">
                <button type="button" class="btn btn-primary btn-xs" id="dataBaru" onclick="openFormBaru()">
                    data baru
                </button>
            </div>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" id="templateTable">
                    <table id="datatable" class="table dataTable">
                        <thead>
                            <tr>
                                <th width="40">no</th>';
    $templateIndex2 = $addColumn;
    $templateIndex3 =
        '</tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        @include("' . $namaKecil . '.form")
    @endsection
    @section("js")
        @include("' . $namaKecil . '.js_dt")
        @include("' . $namaKecil . '.js_crud")
        @include("' . $namaKecil . '.js_custom")
    @endsection';


    $templateForm1 =
        '<div class="card h-100 card-form undisplay">
    <div class="card-header d-flex align-items-center border-0">
        <div class="me-auto">
            <h3 class="h4 m-0">Data Baru</h3>
        </div>
        <div class="toolbar-end">
            <button type="button" class="btn btn-warning btn-xs" id="kembali" onclick="backToIndex()">
                kembali
            </button>
            &nbsp;
            &nbsp;
            &nbsp;
            <button type="button" class="btn btn-mint btn-xs undisplay" id="simpan" onclick="simpanData()">
                simpan
            </button>
            <button type="button" class="btn btn-mint btn-xs undisplay" id="ubah" onclick="ubahData()">
                simpan
            </button>
        </div>
    </div>

    <div class="card-body">
        <form id="templateForm">

            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control undisplay" store="id">
                        <div class="row">';

    $templateForm2 = $addForm;
    $templateForm3 =
        '</div>
                </div>
                </form>
            </div>
    </div>' . "\r\n";

    $js_dt = rtrim(file_get_contents($jsPath . '/master.blade.php'));
    $js_crud = rtrim(file_get_contents($jsPath . '/crud.blade.php'));
    $js_custom1 =
        '<script>
    
            var breadCrumb = [{
                    url: "/home",
                    nama: "Dashboard"
                },
                {
                    url: "/' . $namaKecil . '",
                    nama: "' . $label . '"
                }
            ]' . "\r\n";
    $js_custom2 =
        `var dataColum = [{
        id: null,
        label: 'no',
        className: 'text-end p-r-2',
        "render": function(data, type, full, meta) {
            let baris = meta.row + 1;
            let defaultContent = baris +
                '<div class="list-group">' +
                '<div class="animated bounceIn rowId" rowId="' + full.id + '">' +
                '<a class="dropdown-item list-group-item text-primary" href="#" data-id="' + full.id +
                '" onclick=getData(this)><i class="ti-pencil"></i>Lihat / Ubah</a>' +
                '<a class="dropdown-item list-group-item text-danger" href="#" data-id="' + full.id +
                '" onclick=hapusData(this)>Hapus</a>' +
                '</div>';
            return defaultContent;
        }
    }];`;
    $js_custom3 = $addColumnPush;
    $js_custom4 =
        'reload(url + "/list")
        </script>';

    $templateIndex  = $templateIndex1 . $templateIndex2 . $templateIndex3;
    $templateForm   = $templateForm1 . $templateForm2 . $templateForm3;
    $js_custom      = $js_custom1 . $js_custom2 . $js_custom3 . $js_custom4;

    File::makeDirectory(public_path() . '/../add/Views/' . $namaKecil);
    File::put(public_path() . '/../add/Views/' . $namaKecil . '/index.blade.php', $templateIndex);
    File::put(public_path() . '/../add/Views/' . $namaKecil . '/form.blade.php', $templateForm);
    File::put(public_path() . '/../add/Views/' . $namaKecil . '/js_dt.blade.php', $js_dt);
    File::put(public_path() . '/../add/Views/' . $namaKecil . '/js_crud.blade.php', $js_crud);
    File::put(public_path() . '/../add/Views/' . $namaKecil . '/js_custom.blade.php', $js_custom);

    return 'create View Success';
}

function createRoute($data)
{
    $headerData         = $data['headerData'];
    $detailData         = $data['detailData'];

    $namaKecil          = $headerData['namaKecil'];
    $namaBesar          = $headerData['namaBesar'];
    $nama               = $headerData['nama'];
    $tipe               = $headerData['tipe'];


    $targetPath             = public_path() . '/../routes/web.php';

    $contents = rtrim(file_get_contents($targetPath));
    $old_contents = str_replace("});", "", $contents) . "\r\n";
    $add_contents =
        "Route::resource('/" . $namaKecil . "', '" . $namaBesar . "Controller');
    Route::post('/" . $namaKecil . "/list', '" . $namaBesar . "Controller@list');
    Route::post('/" . $namaKecil . "/getdata', '" . $namaBesar . "Controller@getData');" . "\r\n" . "\r\n";

    $template = $old_contents . $add_contents . "});";

    File::put($targetPath, $template);

    return 'create Route Success';
}

function createAkses($data)
{
    $headerData = $data['headerData'];
    $akses = $headerData['akses'];
    $url = $headerData['url'];
    $user_id = Auth::id();

    foreach ($akses as $key => $value) {

        DB::beginTransaction();
        try {
            $postData['role_id'] = $value['role_id'];
            $postData['url']     = $url;
            $postData['lihat']   = $value['lihat'];
            $postData['tambah']  = $value['tambah'];
            $postData['ubah']    = $value['ubah'];
            $postData['hapus']   = $value['hapus'];
            $postData['created_by']   = $user_id;

            $store = RoleAkses::create($postData);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(["errors" => $ex], 500);
        }
    }

    return 'create Access Success';
}

function createSidebar($data)
{
    $headerData = $data['headerData'];
    $url = $headerData['url'];

    $targetPath       = public_path() . '/../add/Views/base/leftbar.blade.php';

    $contents = rtrim(file_get_contents($targetPath));
    $old_contents = str_replace("</ul></div>", "", $contents) . "\r\n";

    $add_contents =
        '<li class="nav-item side-list">
        <a href="' . $url . '" url="' . $url . '" class="nav-link mininav-toggle ">
            <i class="ti-home  fs-5 me-2"></i>
            <span class="nav-label mininav-content ms-1">' . $headerData['nama'] . '</span>
        </a>
    </li>' . "\r\n" . "\r\n";

    $template = $old_contents . $add_contents . "</ul></div>";

    File::put($targetPath, $template);

    return 'create Sidebar Success';
}

function deleteMenu($data,$sidebar)
{
    $id = $data['id'];
    $nama = $data['nama'];
    $url = $data['url'];
    $tipe = $data['tipe'];
    $namaKecil = $data['nama_kecil'];
    $namaBesar = $data['nama_besar'];

    $controller =  public_path() . '/../add/Controllers/' . $namaBesar . 'Controller.php';
    $model =  public_path() . '/../add/Models/' . $namaBesar . '.php';
    $validasi =  public_path() . '/../add/Requests/' . $namaBesar . 'Request.php';
    $view = public_path() . '/../add/Views/' . $namaKecil;
    $seeder =  public_path() . '/../database/seeders/' . $namaBesar . 'Seeder.php';

    File::delete($controller);
    File::delete($model);
    File::delete($validasi);
    File::deleteDirectory($view);
    File::delete($seeder);

    foreach ($data['menu_migration'] as $key => $value) {
        $targetFile =  str_replace('.php', '', $value['nama']);
        DB::statement("delete from migrations where migration ='".$targetFile."'");
        File::delete(public_path() . '/../database/migrations/' . $value['nama']);
    }


    $targetPathDatabaseSeeder = public_path() . '/../database/seeders/DatabaseSeeder.php';

    $contents = rtrim(file_get_contents($targetPathDatabaseSeeder));
    $old_contents = "use Database\Seeders\\" . $namaBesar . "Seeder;";
    $add_contents = "";
    $new_contents = str_replace($old_contents, $add_contents, $contents);

    $old_contents = $namaBesar.'Seeder::class,';
    $add_contents = "";
    $new_contents = str_replace($old_contents, $add_contents, $new_contents);


    File::put($targetPathDatabaseSeeder, $new_contents);


    $targetPath             = public_path() . '/../routes/web.php';

    $contents = rtrim(file_get_contents($targetPath));
    $old_contents =
        "Route::resource('/" . $namaKecil . "', '" . $namaBesar . "Controller');
    Route::post('/" . $namaKecil . "/list', '" . $namaBesar . "Controller@list');
    Route::post('/" . $namaKecil . "/getdata', '" . $namaBesar . "Controller@getData');";

    $new_contents = str_replace($old_contents, "", $contents) . "\r\n";

    File::put($targetPath, $new_contents);


    $sidebar = '<li class="nav-item side-list">'
    .$sidebar.
    '</li>';

    $targetPath = public_path() . '/../add/Views/base/leftbar.blade.php';
    $contents = rtrim(file_get_contents($targetPath));
    $new_contents = str_replace($sidebar, "", $contents) . "\r\n";

    File::put($targetPath, $new_contents);

    MenuMigration::where('menu_id', $id)->delete();
    MenuKolom::where('menu_id', $id)->delete();
    MenuDetail::where('menu_id', $id)->delete();
    Menu::where('id', $id)->delete();
    RoleAkses::where('url',$url)->delete();

    DB::statement("drop table ".$namaKecil);
    
    return 'delete ' . $tipe . ' ' . $nama . ' Success';
}
