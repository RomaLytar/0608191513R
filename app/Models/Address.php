<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = ['Name', 'city_id', 'area_id', 'Street', 'House', 'Additional'];

    public function city()
    {
        return $this->belongsTo(Cities::class);
    }
    public function area()
    {
        return $this->belongsTo(Areas::class);
    }
}
