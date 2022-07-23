<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class TingkatPrioritas extends Model 
    { 
    
        protected $table='tingkat_prioritas'; 
        protected $fillable=[
            'nama','created_by'];
    
        public static function getTableName() { return (new self())->getTable();} 
                
    } 