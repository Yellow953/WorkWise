<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applied_users()
    {
        return $this->hasMany(User::class);
    }

    // Filter
    public function scopeFilter($q)
    {
        if (request('position')) {
            $position = request('position');
            $q->where('position', 'LIKE', "%{$position}%");
        }
        if (request('location')) {
            $location = request('location');
            $q->where('location', 'LIKE', "%{$location}%");
        }
        if (request('industry')) {
            $industry = request('industry');
            $q->where('industry', 'LIKE', "%{$industry}%");
        }
        if (request('job_type')) {
            $job_type = request('job_type');
            $q->where('job_type', $job_type);
        }
        if (request('experience_level')) {
            $experience_level = request('experience_level');
            $q->where('experience_level', $experience_level);
        }
        if (request('company_id')) {
            $company_id = request('company_id');
            $q->where('company_id', $company_id);
        }

        return $q;
    }
}
