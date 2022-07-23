<?php

namespace Add\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $table = 'menu';
	protected $fillable = ['urutan', 'url', 'nama', 'tipe'];

	public static function getTableName()
	{
		return (new self())->getTable();
	}
	public function menu_detail()
	{
		return $this->hasMany(MenuDetail::class, 'menu_id')->orderBy('id', 'asc');
	}

	public function menu_migration()
	{
		return $this->hasMany(MenuMigration::class, 'menu_id')->orderBy('id', 'asc');
	}

	public function menu_kolom()
	{
		return $this->hasMany(MenuKolom::class, 'menu_id')->orderBy('id', 'asc');
	}
}
