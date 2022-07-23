<?php

    namespace Database\Seeders;
    
    use Illuminate\Database\Seeder;
    use DB;
    
    class AplikasiSeeder extends Seeder
    {
    
      public function run()
      {
         $id = DB::table("menu")->insertGetId([
        "url" => "/aplikasi",
        "nama" => "aplikasi",
        "tipe" => "master",
        "nama_kecil" => "aplikasi",
        "nama_besar" => "Aplikasi",
      ]);
  
      DB::table("menu_migration")->insert([
        "menu_id" => $id,
        "nama" => "2022_07_23_100008_create_aplikasi_table.php",
      ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "text",
            "nama" => "nama",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);

      }
    }