<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebModel extends Model
{
    public function DataKecamatan()
    {
        return DB::table('tbl_kecamatan')
        ->get();
    }

    public function DataHarga()
    {
        return DB::table('tbl_harga')
        ->get();
    }

    public function DetailHarga($id_harga)
    {
        return DB::table('tbl_harga')
        ->where('id_harga', $id_harga)->first();
    }

    public function DataVillaHarga($id_harga)
    {
        return DB::table('tbl_villa')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_villa.id_harga')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_villa.id_kecamatan')
        ->where('tbl_villa.id_harga', $id_harga)
        ->get();
    }

    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
        ->where('id_kecamatan', $id_kecamatan)->first();
    }

    public function DataVilla($id_kecamatan)
    {
        return DB::table('tbl_villa')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_villa.id_harga')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_villa.id_kecamatan')
        ->where('tbl_villa.id_kecamatan', $id_kecamatan)
        ->get();
    }


    public function AllDataVilla()
    {
        return DB::table('tbl_villa')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_villa.id_harga')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_villa.id_kecamatan')
        ->get();
    }

    public function DetailDataVilla($id_villa)
    {
        return DB::table('tbl_villa')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_villa.id_harga')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_villa.id_kecamatan')
        ->where('id_villa', $id_villa)
        ->first();
    }


}
