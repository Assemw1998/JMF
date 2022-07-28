<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
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

        self::creating(function ($color) {
            $color->created_by_id = auth()->user()->id;
            $color->updated_by_id = auth()->user()->id;
        });

        self::created(function ($color) {
            // ... code here
        });

        self::updating(function ($color) {
            $color->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($color) {
            // ... code here
        });

        self::deleting(function ($color) {
            // ... code here
        });

        self::deleted(function ($color) {
            // ... code here
        });
    }
}
