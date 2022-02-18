<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HargaModel extends Model
{
    public function ALLdata()
    {
        return DB::table('tbl_harga')
        ->get();
    }

    public function insertData($data)
    {
        DB::table('tbl_harga')
        ->insert($data);
    }

    public function DetailData($id_harga)
    {
        return DB::table('tbl_harga')
        ->where('id_harga', $id_harga)->first();
    }

    public function UpdateData($id_harga, $data)
    {
        DB::table('tbl_harga')
        ->where('id_harga',$id_harga)
        ->update($data);
    }
    
    public function DeleteData($id_harga)
    {
        DB::table('tbl_harga')
        ->where('id_harga',$id_harga)
        ->delete();
    }

}
