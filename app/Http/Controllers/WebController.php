<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;
use App\Models\VillaModel;

class WebController extends Controller
{
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }
    public function index()
    {
        $data =[
            'title' => 'Pemetaan',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'villa' => $this->WebModel->AllDataVilla(),
            'harga' => $this->WebModel->DataHarga(),

        ];
        
        return view('v_web', $data);
    }

    public function kecamatan($id_kecamatan)
    {
        $kec = $this->WebModel->DetailKecamatan($id_kecamatan);
        $data =[
            'title' => 'Kecamatan' . $kec->kecamatan,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'villa' => $this->WebModel->DataVilla($id_kecamatan),
            'harga' => $this->WebModel->DataHarga(),
            'kec'   => $kec,
        ];
        
        return view('v_kecamatan', $data);

    }

    public function harga($id_harga)
    {
        $hrg = $this->WebModel->DetailHarga($id_harga);
        $data =[
            'title' => 'Harga' . $hrg->harga,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'villa' => $this->WebModel->DataVillaHarga($id_harga),
            'harga' => $this->WebModel->DataHarga(),
        ];
        
        return view('v_harga', $data);
    }

    public function detailvilla($id_villa)
    {
        $villa = $this->WebModel->DetailDataVilla($id_villa);
        $data =[
            'title' => 'Detail' . $villa->nama_villa,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'harga' => $this->WebModel->DataHarga(),
            'villa' => $villa,

        ];
        
        return view('v_detailvilla', $data);
    }
}