<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {

    use HasFactory;
    
    protected $table = 'job_listing';

    protected $fillable = ['title' , 'description', 'employer_id'];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }
}