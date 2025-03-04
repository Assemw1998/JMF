<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelLaravel;

class Motorcycle extends ModelLaravel
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function engineType()
    {
        return $this->belongsTo(EngineType::class);
    }

    public function superAdminCreatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'created_by_id');
    }

    public function superAdminUpdatedBy()
    {
        return $this->belongsTo(SuperAdmin::class, 'updated_by_id');
    }

    public function motorcycleImage()
    {
        return $this->hasMany(MotorcycleImage::class);
    }


    
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_by_id = auth()->user()->id;
            $model->updated_by_id = auth()->user()->id;
        });

        self::created(function ($model) {
            // ... code here
        });

        self::updating(function ($model) {
            $model->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($model) {
            // ... code here
        });

        self::deleting(function ($model) {
            // ... code here
        });

        self::deleted(function ($model) {
            // ... code here
        });
    }
}
