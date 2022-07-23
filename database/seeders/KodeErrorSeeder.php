<?php

    namespace Database\Seeders;
    
    use Illuminate\Database\Seeder;
    use DB;
    
    class KodeErrorSeeder extends Seeder
    {
    
      public function run()
      {
         $id = DB::table("menu")->insertGetId([
        "url" => "/kode_error",
        "nama" => "kode error",
        "tipe" => "master",
        "nama_kecil" => "kode_error",
        "nama_besar" => "KodeError",
      ]);
  
      DB::table("menu_migration")->insert([
        "menu_id" => $id,
        "nama" => "2022_07_23_100009_create_kode_error_table.php",
      ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "text",
            "nama" => "kode_error",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "true",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "area",
            "nama" => "penjelasan",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "area",
            "nama" => "penyelesaian",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "text",
            "nama" => "status",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);

      }
    }