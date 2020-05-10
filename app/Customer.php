<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    //protected $fillable = ['name', 'email', 'active'];

    //untuk mengatasi error ketika create, karena form edit dan create diambil dari form sama
    protected $attributes = [
        'active' => 1,
    ];

    public function getActiveAttribute($attribute)
    {

        // return[
        //     0 => 'Inactive',
        //     1 => 'Active',
        // ][$attribute];
        return $this->activeOptions()[$attribute];

    }
    
    public function scopeActive($query)
    {
    	return $query->where('active', 1);
    } 

    public function scopeInactive($query)
    {
    	return $query->where('active', 0);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function activeOptions()
    {
        return[
            0 => 'Inactive',
            1 => 'Active',
            2 => 'In-Progress',
        ];
    }
}
