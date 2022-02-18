<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KecamatanModel extends Model
{
    public function ALLdata()
    {
        return DB::table('tbl_kecamatan')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_kecamatan.id_harga')
        ->get();
    }

    public function insertData($data)
    {
        DB::table('tbl_kecamatan')
        ->insert($data);
    }
    public function DetailData($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_kecamatan.id_harga')
        ->where('id_kecamatan', $id_kecamatan)->first();
    }

    public function UpdateData($id_kecamatan, $data)
    {
        DB::table('tbl_kecamatan')
        ->where('id_kecamatan',$id_kecamatan)
        ->update($data);
    }

    public function DeleteData($id_kecamatan)
    {
        DB::table('tbl_kecamatan')
        ->where('id_kecamatan',$id_kecamatan)
        ->delete();
    }
}
