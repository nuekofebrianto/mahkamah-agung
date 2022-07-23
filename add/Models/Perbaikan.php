<?php 
    namespace Add\Models; 
    use Illuminate\Database\Eloquent\Model; 
    
    class Perbaikan extends Model 
    { 
    
        protected $table='perbaikan'; 
        protected $fillable=[
            'layanan_id','tingkat_prioritas_id','kategori_perbaikan_id','perbaikan','alasan','created_by'];
    
        public static function getTableName() { return (new self())->getTable();} 
            public function layanan() {
                return $this->belongsTo(Layanan::class, 'layanan_id')->orderBy('id', 'asc');
            }public function tingkat_prioritas() {
                return $this->belongsTo(TingkatPrioritas::class, 'tingkat_prioritas_id')->orderBy('id', 'asc');
            }public function kategori_perbaikan() {
                return $this->belongsTo(KategoriPerbaikan::class, 'kategori_perbaikan_id')->orderBy('id', 'asc');
            }    
    } 