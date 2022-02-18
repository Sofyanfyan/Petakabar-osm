<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data =[
            'title' => 'Dashboard',
            'kecamatan' => DB::table('tbl_kecamatan')->count(),
            'harga' => DB::table('tbl_harga')->count(),
            'villa' => DB::table('tbl_villa')->count(),
            'user' => DB::table('users')->count(),
        ];
        
        return view('v_home', $data);
    }

}
