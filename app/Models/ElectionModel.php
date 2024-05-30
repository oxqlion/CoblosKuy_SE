<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ElectionModel extends Model
{
    use HasFactory;

    //Membuat attribut seperti tabel
    protected $fillable = [
        'name',
        'description',
        'timeStart',
        'timeEnd',
        'banner'
    ];

    public function votes()
    {
        return $this->hasMany(VoteModel::class);
    }

    public function candidates():HasMany
    {
        return $this->hasMany(CandidateModel::class);
    }
}
