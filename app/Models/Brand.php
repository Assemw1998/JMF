<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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

        self::creating(function ($brand) {
            $brand->created_by_id = auth()->user()->id;
            $brand->updated_by_id = auth()->user()->id;
        });

        self::created(function ($brand) {
            // ... code here
        });

        self::updating(function ($brand) {
            $brand->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($brand) {
            // ... code here
        });

        self::deleting(function ($brand) {
            // ... code here
        });

        self::deleted(function ($brand) {
            // ... code here
        });
    }
}
