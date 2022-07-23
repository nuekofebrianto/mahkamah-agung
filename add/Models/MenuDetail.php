<?php

namespace Add\Models;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
	protected $table='menu_detail';
	protected $fillable=['menu_id','nama'];

	public static function getTableName(){return (new self())->getTable();}
	public function menu() { return $this->belongsTo(Menu::class,"menu_id"); } 
}

