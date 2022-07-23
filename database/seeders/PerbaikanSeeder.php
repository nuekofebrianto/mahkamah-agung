<?php

    namespace Database\Seeders;
    
    use Illuminate\Database\Seeder;
    use DB;
    
    class PerbaikanSeeder extends Seeder
    {
    
      public function run()
      {
         $id = DB::table("menu")->insertGetId([
        "url" => "/perbaikan",
        "nama" => "perbaikan",
        "tipe" => "master",
        "nama_kecil" => "perbaikan",
        "nama_besar" => "Perbaikan",
      ]);
  
      DB::table("menu_migration")->insert([
        "menu_id" => $id,
        "nama" => "2022_07_23_100013_create_perbaikan_table.php",
      ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "relasi",
            "nama" => "layanan",
            "default" => "nomor_antrian",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "relasi",
            "nama" => "tingkat_prioritas",
            "default" => "nama",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "relasi",
            "nama" => "kategori_perbaikan",
            "default" => "nama",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "area",
            "nama" => "perbaikan",
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
            "nama" => "alasan",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);

      }
    }