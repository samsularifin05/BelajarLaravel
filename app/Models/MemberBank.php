<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MemberBank extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'tbl_member';
    protected $fillable = [
        'nama_member',
        'email_member',
        'no_telp_member',
        'alamat_member'
    ];
}