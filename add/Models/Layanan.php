<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class Layanan extends Model 
    { 
    
        protected $table='layanan'; 
        protected $fillable=[
            'kode_error','aplikasi_id','tanggal_layanan','nomor_antrian','satker_organisasi','keterangan_layanan','status_layanan','created_by'];
    
        public static function getTableName() { return (new self())->getTable();} 
            public function kode_error() {
                return $this->belongsTo(KodeError::class, 'kode_error_id')->orderBy('id', 'asc');
            }public function aplikasi() {
                return $this->belongsTo(Aplikasi::class, 'aplikasi_id')->orderBy('id', 'asc');
            }    
    } 