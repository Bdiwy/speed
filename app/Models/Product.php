<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
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
    public static function getCountOfSchema(){
        return DB::table('INFORMATION_SCHEMA_TABLES')
        ->where('TABLE_SCHEMA', DB::connection()->getDatabaseName())
        ->where('TABLE_NAME', static::make()->getTable())
        ->first()->TABLE_ROWS;
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
