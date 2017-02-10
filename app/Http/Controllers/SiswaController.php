<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use Storage;
use App\Http\Requests\SiswaRequest;
use Session;
#use Validator;

class SiswaController extends Controller
{

    public function index()
    {
		$siswa_list = Siswa::orderBy('nama_siswa', 'asc')->paginate(4);
		$jumlah_siswa = $siswa_list->count();
		return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }

    public function create()
    {
    	return view('siswa.create', compact('list_kelas', 'list_hobi'));
    }

    public function store(SiswaRequest $request)
    {

    	/*
    	*Siswa::create($request->all());
    	*return redirect('siswa');
    	*/

    	$input = $request->all();

        //kode untuk validasi inputan form
        //kode telah dipindahkan, untuk penangangan input ke -> SiswaRequest
        /*
        *        $this->validate($request, [
        *                   'nisn'          => 'required|string|size:4|unique:siswa,nisn',
        *                   'nama_siswa'    => 'required|string|max:30',
        *                   'tanggal_lahir' => 'required|date',
        *                   'jenis_kelamin' => 'required|in:L,P',
        *                   'nomer_telepon' => 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
        *                   'id_kelas'      => 'required',
        *       ]);
        */

        //Upload foto
        //if($request->hasFile('foto')){
        //    $input['foto'] = $this->uploadFoto($request);
        //}

    	$siswa = Siswa::create($input);

        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        //simpan hobi_siswa
        $siswa->hobi()->attach($request->input('hobi'));

        //pemberitahuan, apakah data sudah tersimpan atau gagal
        //Session::flash('flash_message', 'Data siswa berhasil disimpan');

    	return redirect ('siswa');
    }

    public function show(Siswa $siswa)
    {
    	//kode yang diberi tanda komentar adalah menggunakan Route Model Binding
        /*
            * jika pola tententu mengandung pola tertentu, maka secara otomatis
            * kita akan mendapatkan instance dari object model yang kita letakan 
            *  function show (Model $value){ ... }
        */
        //$siswa = Siswa::findOrFail($id);
    	return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        //Route Model Binding
        //$siswa = Siswa::findOrFail($id);
        $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Siswa $siswa, SiswaRequest $request)
    {
        //Route Model Binding
        //$siswa = Siswa::findOrFail($id);
        $input = $request->all();


        //cek apakah ada foto baru di form 
        if($request->hasFile('foto')){
            //hapus foto lama jika ada foto baru
            $this->hapusFoto($siswa);

            //foto upload baru
            $input['foto'] = $this->uploadFoto($request);

        }

        //updtae data siswa
        $siswa->update($request->all());

        //update telepon
        $telepon = $siswa->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->sync($request->input('hobi_siswa'));

        //pemberitahuan, ketika berhasil update data
        Session::flash('flash_message', 'Data siswa berhasil di update');

        return redirect('siswa');
    }

    public function destroy(Siswa $siswa)
    {
        //Route Model Binding
        //$siswa = Siswa::findOrFail($id);

        //Hapus foto siswa
        $this->hapusFoto($siswa);
        $siswa->delete();

        //pemberitahuan, ketika mengahpus data
        Session::flash('flash_message', 'Data siswa berhasil dihapus');
        Session::flash('penting', true);

        return redirect('siswa');
    }

    public function testColletion()
    {
        //$orang = ['ramus lerdof', 'taylor otwel', 'brendan eitch', 'jhon resig'];
        //$kolleksi = collect($orang)->map(function ($nama){
        //    return ucwords($nama);
        //});

        $kolleksi = Siswa::all()->take(2);
        return $kolleksi;
    }

    public function getNamaSiswaAttribute($nama_siswa)
    {
        return ucwords($nama_siswa);
    }

    public function setNamaSiswaAttribute($nama_siswa)
    {
        return strtolower($nama_siswa);
    }

    public function getHobiSiswaAttribute()
    {
        return $this->hobi->lists('id')->toArray();
    }

    private function uploadFoto(SiswaRequest $siswa)
    {
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();

            if($request->file('foto')->isValid()){
                $foto_name = date('YmdHis').".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                //$input['foto'] = $foto_name;

                return $foto_name;
            }

        return false;
    }

    /*
        * method ini berguna untuk menghapus foto yang telah di upload
        *
    */
    private function hapusFoto(Siswa $siswa)
    {
        $exist = Storage::disk('foto')->exists($siswa->foto);
        if(isset($siswa->foto) && $exist){
            $delete = Storage::disk('foto')->delete($siswa->foto);
            if($delete){
                return true;
            }
            return false;
        }
    }

    public function cari(Request $request)
    {
        $kata_kunci     = trim($request->input('kata_kunci'));

        if (! empty($kata_kunci)) {
            $jenis_kelamin = $request->input('jenis_kelamin');
            $id_kelas = $request->input('id_kelas');

            //Query
            $query          = Siswa::where('nama_siswa', 'LIKE', '%'. $kata_kunci . '%');
            (! empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
            (! empty($id_kelas)) ? $query->Kelas($id_kelas) : '';
            $siswa_list     = $query->paginate(2);
            $pagination = (! empty($jenis_kelamin)) ? $siswa_list->appends(['jenis_kelamin' => $jenis_kelamin]) : '';
            $pagination = (! empty($id_kelas)) ? $siswa_list->appends(['id_kelas' => $id_kelas]) : '';
            $pagination = $siswa_list->appends(['kata_kunci' => $kata_kunci]);
            $jumlah_siswa   = $siswa_list->total();
            return view('siswa/index', compact('siswa_list', 'kata_kunci', 'pagination', 'jumlah_siswa'));
        }

        return redirect('siswa');
    }
}
