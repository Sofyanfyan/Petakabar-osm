<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserModel extends Model
{
    public function ALLdata()
    {
        return DB::table('users')
        ->get();
    }

    public function insertData($data)
    {
        DB::table('users')
        ->insert($data);
    }

    public function DetailData($id)
    {
        return DB::table('users')
        ->where('id', $id)->first();
    }

    public function UpdateData($id, $data)
    {
        DB::table('users')
        ->where('id',$id)
        ->update($data);
    }
    
    public function DeleteData($id)
    {
        DB::table('users')
        ->where('id',$id)
        ->delete();
    }
}
