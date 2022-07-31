<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class Layanan extends Model 
    { 
    
        protected $table='layanan'; 
        protected $fillable=[
            'kode_error','aplikasi_id','penjelasan_insiden','satker_organisasi','tingkat_prioritas_id','kategori_perbaikan_id','perbaikan','alasan','status','created_by'];
    
        public static function getTableName() { return (new self())->getTable();} 
            public function aplikasi() {
                return $this->belongsTo(Aplikasi::class, 'aplikasi_id')->orderBy('id', 'asc');
            }public function tingkat_prioritas() {
                return $this->belongsTo(TingkatPrioritas::class, 'tingkat_prioritas_id')->orderBy('id', 'asc');
            }public function kategori_perbaikan() {
                return $this->belongsTo(KategoriPerbaikan::class, 'kategori_perbaikan_id')->orderBy('id', 'asc');
            }    
    } 