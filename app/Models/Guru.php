<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = ['nip', 'nama_guru', 'jk', 'agama', 'tmpt', 'tgl','image'];
    protected $visible = ['nip', 'nama_guru', 'jk', 'agama', 'tmpt', 'tgl','image'];

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_mapel');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_kelas');
    }
}
