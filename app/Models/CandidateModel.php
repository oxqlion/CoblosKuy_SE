<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function election():BelongsTo
    {
        return $this->belongsTo(ElectionModel::class, 'electionId', 'id');
    }
}
