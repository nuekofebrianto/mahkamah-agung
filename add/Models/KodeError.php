<?php

namespace Add\Models;

use Illuminate\Database\Eloquent\Model;

class KodeError extends Model
{

    protected $table = 'kode_error';
    protected $fillable = [
        'kode_error', 'penjelasan', 'penyelesaian', 'aplikasi_id', 'tanggal_layanan', 'nomor_antrian', 'satker_organisasi', 'keterangan_layanan', 'tingkat_prioritas_id', 'kategori_perbaikan_id', 'perbaikan', 'alasan',  'status', 'created_by'
    ];

    public static function getTableName()
    {
        return (new self())->getTable();
    }
    public function aplikasi()
    {
        return $this->belongsTo(Aplikasi::class, "aplikasi_id");
    }
    public function tingkat_prioritas()
    {
        return $this->belongsTo(TingkatPrioritas::class, "tingkat_prioritas_id");
    }
    public function kategori_perbaikan()
    {
        return $this->belongsTo(KategoriPerbaikan::class, "kategori_perbaikan_id");
    }
}
