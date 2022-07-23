<?php

namespace Add\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayananRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == "POST") {
            return [
                'kode_error' => 'String|required|unique:kode_error,kode_error',
                'aplikasi_id' => 'Integer|required',
                'tanggal_layanan' => 'Date|required',
                'nomor_antrian' => 'String|required|unique:layanan,nomor_antrian',
                'satker_organisasi' => 'String|required',
                'keterangan_layanan' => 'String|required',
            ];
        } else {
            return [
                'kode_error' => 'String|required|unique:kode_error,kode_error,' . $this->request->get("id"),
                'aplikasi_id' => 'Integer|required',
                'tanggal_layanan' => 'Date|required',
                'nomor_antrian' => 'String|required|unique:layanan,nomor_antrian,' . $this->request->get("id"),
                'satker_organisasi' => 'String|required',
                'keterangan_layanan' => 'String|required',
            ];
        }
    }
    public function messages()
    {
        return [
            "kode_error.unique" => "kode_error sudah ada !",
            "kode_error.String" => "kode_error harus berupa angka !",
            "kode_error.required" => "kode_error tidak boleh kosong !",
            "aplikasi_id.Integer" => "aplikasi harus berupa angka !",
            "aplikasi.required" => "aplikasi tidak boleh kosong !",
            "tanggal_layanan.Date" => "tanggal_layanan harus berupa angka !",
            "tanggal_layanan.required" => "tanggal_layanan tidak boleh kosong !",
            "nomor_antrian.String" => "nomor_antrian harus berupa text !",
            "nomor_antrian.required" => "nomor_antrian tidak boleh kosong !",
            "nomor_antrian.unique" => "nomor_antrian sudah digunakan !",
            "satker_organisasi.String" => "satker_organisasi harus berupa text !",
            "satker_organisasi.required" => "satker_organisasi tidak boleh kosong !",
            "keterangan_layanan.String" => "keterangan_layanan harus berupa text !",
            "keterangan_layanan.required" => "keterangan_layanan tidak boleh kosong !",

        ];
    }
}
