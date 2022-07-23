<?php

    namespace Database\Seeders;
    
    use Illuminate\Database\Seeder;
    use DB;
    
    class LayananSeeder extends Seeder
    {
    
      public function run()
      {
         $id = DB::table("menu")->insertGetId([
        "url" => "/layanan",
        "nama" => "layanan",
        "tipe" => "master",
        "nama_kecil" => "layanan",
        "nama_besar" => "Layanan",
      ]);
  
      DB::table("menu_migration")->insert([
        "menu_id" => $id,
        "nama" => "2022_07_23_100010_create_layanan_table.php",
      ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "relasi",
            "nama" => "kode_error",
            "default" => "kode_error",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "relasi",
            "nama" => "aplikasi",
            "default" => "nama",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "date",
            "nama" => "tanggal_layanan",
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
            "nama" => "nomor_antrian",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "true",
            "min" => "0",
            "max" => "0",
          ]);
DB::table("menu_kolom")->insert([
            "menu_id" => $id,
            "tipe" => "text",
            "nama" => "satker_organisasi",
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
            "nama" => "keterangan_layanan",
            "default" => "",
            "coma" => "0",
            "required" => "true",
            "unique" => "false",
            "min" => "0",
            "max" => "0",
          ]);

      }
    }