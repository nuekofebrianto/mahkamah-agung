<?php

namespace Add\Models;

use Illuminate\Database\Eloquent\Model;

class MenuMigration extends Model
{
	protected $table='menu_migration';
	protected $fillable=['menu_id','nama'];

	public static function getTableName(){return (new self())->getTable();}
	public function menu() { return $this->belongsTo(Menu::class,"menu_id"); } 
}

