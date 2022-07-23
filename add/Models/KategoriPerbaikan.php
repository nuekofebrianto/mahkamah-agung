<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class KategoriPerbaikan extends Model 
    { 
    
        protected $table='kategori_perbaikan'; 
        protected $fillable=[
            'nama','created_by'];
    
        public static function getTableName() { return (new self())->getTable();} 
                
    } 