<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class VillaModel extends Model
{
    public function ALLdata()
    {
        return DB::table('tbl_villa')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_villa.id_harga')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_villa.id_kecamatan')
        ->get();
    }

    public function insertData($data)
    {
        DB::table('tbl_villa')
        ->insert($data);
    }

    public function DetailData($id_villa)
    {
        return DB::table('tbl_villa')
        ->join('tbl_harga', 'tbl_harga.id_harga', '=', 'tbl_villa.id_harga')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_villa.id_kecamatan')
        ->where('id_villa', $id_villa)->first();
    }

    public function UpdateData($id_villa, $data)
    {
        DB::table('tbl_villa')
        ->where('id_villa',$id_villa)
        ->update($data);
    }

    public function DeleteData($id_villa)
    {
        DB::table('tbl_villa')
        ->where('id_villa',$id_villa)
        ->delete();
    }
    
}
