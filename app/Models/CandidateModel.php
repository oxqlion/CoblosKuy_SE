<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateModel extends Model
{
    use HasFactory;

    protected $fillables = [
        'name',
        'photo',
        'numberOfVotes',
        'description',
        'electionId'
    ];

    public function election():BelongsTo
    {
        return $this->belongsTo(ElectionModel::class, 'electionId', 'id');
    }

}
