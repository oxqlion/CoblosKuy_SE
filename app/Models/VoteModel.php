<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteModel extends Model
{
    use HasFactory;

    //Membuat attribut seperti tabel
    protected $fillable = [
        'electionId',
        'voteTime',
        'userId',
    ];

    public function election()
    {
        return $this->belongsTo(ElectionModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
