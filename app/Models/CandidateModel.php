<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateModel extends Model
{
    use HasFactory;

    //Membuat attribut seperti tabel
    protected $fillable = [
        'name',
        'mission',
        'vision',
        'voteCount',
        'profilePicture'
    ];
}
