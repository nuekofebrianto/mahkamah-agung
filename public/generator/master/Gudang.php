<?php 
namespace Add\Models; 
use Illuminate\Database\Eloquent\Model; 

class Gudang extends Model 
{ 

	protected $table="gudang"; 
	protected $fillable=["nama","created_by"];

	public static function getTableName() { return (new self())->getTable();} 
} 