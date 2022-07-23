<?php

namespace Add\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	protected $table = "role";
	protected $fillable = ["nama", "created_by"];

	public static function getTableName()
	{
		return (new self())->getTable();
	}
	public function role_akses()
	{
		return $this->hasMany(RoleAkses::class, 'role_id')->orderBy('id', 'asc');
	}

	public function user()
	{
		return $this->hasOne(User::class, 'role_id')->orderBy('id', 'asc');
	}
	
}
