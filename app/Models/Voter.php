<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Voter extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'mobile',
        'email',
        'address',
        'taluk',
        'district',
        'state',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
        static::creating(function ($voter) {
            $voter->slug = Str::slug($voter->first_name . '-' . $voter->last_name . '-' . Str::random(5));
        });
    }
    // Mutator for first_name
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }

    // Accessors
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
