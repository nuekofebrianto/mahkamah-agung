<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TingkatPrioritasSeeder extends Seeder
{

  public function run()
  {
    $id = DB::table("menu")->insertGetId([
      "url" => "/tingkat_prioritas",
      "nama" => "tingkat prioritas",
      "tipe" => "master",
      "nama_kecil" => "tingkat_prioritas",
      "nama_besar" => "TingkatPrioritas",
    ]);

    DB::table("menu_migration")->insert([
      "menu_id" => $id,
      "nama" => "2022_07_23_100011_create_tingkat_prioritas_table.php",
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

    DB::table("tingkat_prioritas")->insert([
      "nama" => "belum",
    ]);
  }
}
