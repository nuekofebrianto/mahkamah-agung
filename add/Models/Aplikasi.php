<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class Aplikasi extends Model 
    { 
    
        protected $table='aplikasi'; 
        protected $fillable=[
            'nama','created_by'];
    
        public static function getTableName() { return (new self())->getTable();} 
                
    } 