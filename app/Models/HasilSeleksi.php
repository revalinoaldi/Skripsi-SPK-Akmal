<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSeleksi extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hasil_seleksi';
    protected $primaryKey = 'id_hasil';

    protected $fillable = [
        'user_id',
        'nilai_ijazah',
        'nilai_skhun',
        'nilai_tulis',
        'nilai_wawancara',
        'nilai_akhir'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
