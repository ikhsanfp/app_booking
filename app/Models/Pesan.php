<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = [

        'jenislap',
        'tglmain',
        'date',
        'start',
        'end',
        'id_pemain'
    ];
    protected $time = ['time'];
    protected $primaryKey = "id";

    public function profile()
    {
        return $this->belongsTo(User::class, 'id_pemain', 'id');
    }
}
