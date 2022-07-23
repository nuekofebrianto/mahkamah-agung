<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class KodeError extends Model 
    { 
    
        protected $table='kode_error'; 
        protected $fillable=[
            'kode_error','penjelasan','penyelesaian','status','created_by'];
    
        public static function getTableName() { return (new self())->getTable();} 
                
    } 