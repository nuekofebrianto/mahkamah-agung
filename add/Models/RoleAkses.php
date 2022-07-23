<?php

namespace Add\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAkses extends Model
{

    protected $table = "role_akses";
    protected $fillable = ["role_id", 'url', 'lihat', 'tambah', 'ubah', 'hapus', 'download', "created_by"];

    public static function getTableName()
    {
        return (new self())->getTable();
    }
    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }
}
