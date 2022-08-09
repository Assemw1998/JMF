<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function superAdminCreatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'created_by_id');
    }

    public function superAdminUpdatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'updated_by_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($city) {
            $city->created_by_id = auth()->user()->id;
            $city->updated_by_id = auth()->user()->id;
        });

        self::created(function ($city) {
            // ... code here
        });

        self::updating(function ($city) {
            $city->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($city) {
            // ... code here
        });

        self::deleting(function ($city) {
            // ... code here
        });

        self::deleted(function ($city) {
            // ... code here
        });
    }
}
