<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function experticelevels()
    {
        return $this->belongsToMany(ExperticeLevel::class);
    }

    public function jobtypes()
    {
        return $this->belongsToMany(JobType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function applicants()
    {
        return $this->belongsToMany(User::class);
    }
}
