<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aplikasi extends Model
{
    use HasFactory;
    protected $table = 'aplikasi';
    protected $fillable = ['logo', 'nama_owner', 'alamat', 'tlp', 'title', 'nama_aplikasi', 'version', 'copy_right'];
    public static function getapk()
    {
        $data = DB::select('select * from aplikasi');
        return ($data);
    }
}
