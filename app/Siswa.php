<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    //fillable adalah array yang berisi nama-nama kolom
    //yang dapat kita isi secara Mass Assigment

    /*
    	* Mass Assigment adalah design patterern Active Record, dimana
    	* kita bisa menginputkan / menyimpan suatu baris data dengan beberapa nilai 
    */

    //deklarasi

    protected $fillable = [
    	'nisn',
    	'nama_siswa',
    	'tanggal_lahir',
    	'jenis_kelamin',
        'id_kelas',
        'foto',
    ];

    //function untuk relasi ke table telpon (one to one)

    public function telepon()
    {
        return $this->hasOne('App\Telepon', 'id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function hobi()
    {
        return $this->belongsToMany('App\Hobi', 'hobi_siswa', 'id_siswa', 'id_hobi')->withTimeStamps();
    }

    public function scopeKelas($query, $id_kelas)
    {
        return $query->where('id_kelas', $id_kelas);
    }

    public function scopeJenisKelamin($query, $jenis_kelamin)
    {
        return $query->where('jenis_kelamin', $jenis_kelamin);
    }
}
