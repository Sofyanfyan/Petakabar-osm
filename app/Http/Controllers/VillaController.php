<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VillaModel;
use App\Models\HargaModel;
use App\Models\KecamatanModel;

class VillaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->VillaModel = new VillaModel();
        $this->HargaModel = new HargaModel();
        $this->KecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $data =[
            'title' => 'Detail ', 
            'villa' => $this->VillaModel->AllData(),
        ];
        
        return view('admin.villa.v_index', $data);
    }

    public function add()
    {
        $data =[
            'title' => 'Add Villa',
            'harga' => $this->HargaModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        
        return view('admin.villa.v_add', $data);
    }

    public function insert()
    {
        Request()->validate(
        [
            'nama_villa' => 'required',
            'id_harga' => 'required',
            'harga_villa' => 'required',
            'untuk' => 'required',
            'id_kecamatan' => 'required',
            'kolam' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'foto' => 'required',
            'Telepon' => 'required',
            'deskripsi' => 'required',
        ],
        [
            'nama_villa.required' => 'Wajib Diisi !!!',
            'id_harga.required' => 'Wajib Diisi !!!',
            'harga_villa.required' => 'Wajib Diisi !!!',
            'untuk.required' => 'Wajib Diisi !!!',
            'id_kecamatan.required' => 'Wajib Diisi !!!',
            'kolam.required' => 'Wajib Diisi !!!',
            'alamat.required' => 'Wajib Diisi !!!',
            'foto.required' => 'Wajib Diisi !!!',
            'Telepon.required' => 'Wajib Diisi !!!',
            'deskripsi.required' => 'Wajib Diisi !!!',
            'posisi.required' => 'Wajib Diisi !!!',

        ]
        
        );
        //jika validasinya tidak ada maka lakukan simpan data ke database
        $file = Request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'),$filename);

        $data = [
            'nama_villa' => Request()->nama_villa,
            'id_harga' => Request()->id_harga,
            'harga_villa' => Request()->harga_villa,
            'untuk' => Request()->untuk,
            'kolam' => Request()->kolam,
            'id_kecamatan' => Request()->id_kecamatan,
            'alamat' => Request()->alamat,
            'posisi' => Request()->posisi,
            'deskripsi' => Request()->deskripsi,
            'Telepon' => Request()->Telepon,
            'foto' => $filename,
        ];
        $this->VillaModel->InsertData($data);
        return redirect()->route('villa')->with('pesan','Data Berhasil Di Tambahkan');
    }

    public function edit($id_villa)
    {
        $data =[
            'title' => 'Edit Villa',
            'harga' => $this->HargaModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
            'villa' => $this->VillaModel->DetailData($id_villa)
        ];
        
        return view('admin.villa.v_edit', $data);
    }
    
    public function update($id_villa)
    {
        Request()->validate(
            [
                'nama_villa' => 'required',
                'id_harga' => 'required',
                'harga_villa' => 'required',
                'untuk' => 'required',
                'id_kecamatan' => 'required',
                'kolam' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'Telepon' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'nama_villa.required' => 'Wajib Diisi !!!',
                'id_harga.required' => 'Wajib Diisi !!!',
                'harga_villa.required' => 'Wajib Diisi !!!',
                'untuk.required' => 'Wajib Diisi !!!',
                'id_kecamatan.required' => 'Wajib Diisi !!!',
                'kolam.required' => 'Wajib Diisi !!!',
                'alamat.required' => 'Wajib Diisi !!!',
                'Telepon.required' => 'Wajib Diisi !!!',
                'deskripsi.required' => 'Wajib Diisi !!!',
                'posisi.required' => 'Wajib Diisi !!!',
    
            ]
            
            );
            
            if (Request()->foto <> ""){
                //hapus foto lama
                $villa = $this->VillaModel->DetailData($id_villa);
                if($villa->foto <> ""){
                    unlink(public_path('foto').'/'.$villa->foto);
                }
                //JIka igin ganti foto
                $file = Request()->foto;
                $filename = $file->getClientOriginalName();
                $file->move(public_path('foto '),$filename);
                
                
                $data = [
                    'nama_villa' => Request()->nama_villa,
                    'id_harga' => Request()->id_harga,
                    'harga_villa' => Request()->harga_villa,
                    'untuk' => Request()->untuk,
                    'kolam' => Request()->kolam,
                    'id_kecamatan' => Request()->id_kecamatan,
                    'alamat' => Request()->alamat,
                    'posisi' => Request()->posisi,
                    'deskripsi' => Request()->deskripsi,
                    'Telepon' => Request()->Telepon,
                    'foto' => $filename,
                ];
                $this->VillaModel->UpdateData($id_villa, $data);
            } else {
                //jika tidak ingin ganti foto
                $data = [
                    'nama_villa' => Request()->nama_villa,
                    'id_harga' => Request()->id_harga,
                    'harga_villa' => Request()->harga_villa,
                    'untuk' => Request()->untuk,
                    'kolam' => Request()->kolam,
                    'id_kecamatan' => Request()->id_kecamatan,
                    'alamat' => Request()->alamat,
                    'posisi' => Request()->posisi,
                    'deskripsi' => Request()->deskripsi,
                    'Telepon' => Request()->Telepon,
                ];
                $this->VillaModel->UpdateData($id_villa, $data);
            
            }
            return redirect()->route('villa')->with('pesan','Data Berhasil Di Update !!!');
        }

        public function delete($id_villa)
    {
        if (Request()->foto <> ""){
            //hapus foto lama
            $villa = $this->VillaModel->DetailData($id_villa);
            if($villa->foto <> ""){
                unlink(public_path('foto').'/'.$villa->foto);
            }

            $this->VillaModel->DeleteData($id_villa);
                return redirect()->route('villa')->with('pesan','Data Berhasil Di Delete!!!');
        }
    }

}
