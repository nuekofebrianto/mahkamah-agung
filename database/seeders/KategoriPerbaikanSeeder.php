<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KategoriPerbaikanSeeder extends Seeder
{

  public function run()
  {
    $id = DB::table("menu")->insertGetId([
      "url" => "/kategori_perbaikan",
      "nama" => "kategori perbaikan",
      "tipe" => "master",
      "nama_kecil" => "kategori_perbaikan",
      "nama_besar" => "KategoriPerbaikan",
    ]);

    DB::table("menu_migration")->insert([
      "menu_id" => $id,
      "nama" => "2022_07_23_100012_create_kategori_perbaikan_table.php",
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

    DB::table("kategori_perbaikan")->insert([
      "nama" => "belum",
    ]);
  }
}
