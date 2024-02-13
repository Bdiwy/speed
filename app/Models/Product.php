<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $filable = [
        'name',
        'description',
        'price',
        'company_id',
        'brand_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
