<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HargaModel;

class HargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->HargaModel = new HargaModel();
    }


    public function index()
    {
        $data =[
            'title' => 'Harga', 
            'harga' => $this->HargaModel->AllData(),
        ];
        
        return view('admin.harga.v_index', $data);
    }

    public function add()
    {
        $data =[
            'title' => 'Add Harga',
        ];
        
        return view('admin.harga.v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'harga' =>  'required',
            'icon'    => 'required|max:1024',

        ],  [
            'harga.required' => 'Wajib Diisi !!!',
            'icon.required'    => 'Wajib Diisi !!!',
        ]);

        $file = Request()->icon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('icon '),$filename);

        $data = [
            'harga' => Request()->harga,
            'icon' => $filename,
        ];

        $this->HargaModel->insertData($data);
        return redirect()->route('harga')->with('pesan','Data Berhasil Di Tambahkan !!!');

    }

    public function edit($id_harga)
    {
        $data =[
            'title' => 'Edit Harga',
            'harga' => $this->HargaModel->DetailData($id_harga),
        ];
        
        return view('admin.harga.v_edit', $data);
    }

    public function update($id_harga)
    {
        Request()->validate([
            'harga' =>  'required',
        ],  [
            'harga.required' => 'Wajib Diisi !!!',
        ]);

        if (Request()->icon <> ""){
            //hapus icon lama
            $harga = $this->HargaModel->DetailData($id_harga);
            if($harga->icon <> ""){
                unlink(public_path('icon').'/'.$harga->icon);
            }
            //JIka igin ganti icon
            $file = Request()->icon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('icon '),$filename);
            $data = [
                'harga' => Request()->harga,
                'icon' => $filename,
            ];
    
            $this->HargaModel->UpdateData($id_harga, $data);
            
        } else {
            //jika tidak ingin ganti icon
            $data = [
                'harga' => Request()->harga,
            ];
    
            $this->HargaModel->UpdateData($id_harga, $data);
        
        }
        return redirect()->route('harga')->with('pesan','Data Berhasil Di Update !!!');
    }

    public function delete($id_harga)
    {
        if (Request()->icon <> ""){
            //hapus icon lama
            $harga = $this->HargaModel->DetailData($id_harga);
            if($harga->icon <> ""){
                unlink(public_path('icon').'/'.$harga->icon);
            }

            $this->HargaModel->DeleteData($id_harga);
                return redirect()->route('harga')->with('pesan','Data Berhasil Di Delete!!!');
        }
    }
}