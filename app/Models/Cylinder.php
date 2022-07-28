<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cylinder extends Model
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

        self::creating(function ($cylinder) {
            $cylinder->created_by_id = auth()->user()->id;
            $cylinder->updated_by_id = auth()->user()->id;
        });

        self::created(function ($cylinder) {
            // ... code here
        });

        self::updating(function ($cylinder) {
            $cylinder->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($cylinder) {
            // ... code here
        });

        self::deleting(function ($cylinder) {
            // ... code here
        });

        self::deleted(function ($cylinder) {
            // ... code here
        });
    }
}
