<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $table = "absens";
    protected $primary = "id";
    protected $fillable = [
    'id', 
    'student_id', 
    'tgl',
    'jammasuk',
    'jampulang',
    'jamsekolah',
    'tidakhadir',
    'alasan',
    'bukti'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
