<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelLaravel;

class Customer extends ModelLaravel
{
    use HasFactory;


    public function birthCity()
    {
        return $this->belongsTo(City::class, 'birth_city_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function IdImage()
    {
        return $this->hasMany(IdImage::class);
    }
    public function LicenseImage()
    {
        return $this->hasOne(LicenseImage::class);
    }

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

        self::creating(function ($customer) {
            $customer->created_by_id = auth()->user()->id;
            $customer->updated_by_id = auth()->user()->id;
        });

        self::created(function ($customer) {
            // ... code here
        });

        self::updating(function ($customer) {
            $customer->updated_by_id = auth()->user()->id;
        });

        self::updated(function ($customer) {
            // ... code here
        });

        self::deleting(function ($customer) {
            // ... code here
        });

        self::deleted(function ($customer) {
            // ... code here
        });
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
