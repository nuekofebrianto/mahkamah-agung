<?php

namespace Add\Models;

use Illuminate\Database\Eloquent\Model;

class MenuKolom extends Model
{
	protected $table='menu_kolom';
	protected $fillable=['menu_id','tipe','nama','default','coma','required','unique','min','max'];

	public static function getTableName(){return (new self())->getTable();}
	public function menu() { return $this->belongsTo(Menu::class,"menu_id"); } 
}

