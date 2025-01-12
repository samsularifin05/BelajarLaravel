<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BankModel extends Model
{
    //
    use HasFactory, Notifiable;
    protected $table = 'bank';
    protected $fillable = [
        'kode_bank',
        'nama_bank',
        'no_rekening',
    ];
}