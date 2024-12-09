<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employers extends Model
{
    /** @use HasFactory<\Database\Factories\EmployersFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jobs(){
        return $this->hasMany(Jobs::class);
    }
}