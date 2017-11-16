<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = ['name', 'price','year', 'category_id', 'brand_id', 'car_model_id'];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function model()
    {
        return $this->belongsTo('App\CarModel', 'car_model_id');
    }
    public function scopeSortByBrand($query){
       return $query->join('brands', 'cars.brand_id', '=', 'brands.id')
           ->orderBy('brands.brand', 'asc')
           ->select('cars.*')
           ->get();
    }
    public function scopeSortByModel($query){
        return $query->join('car_models', 'cars.car_model_id', '=', 'car_models.id')
            ->orderBy('car_models.name', 'asc')
            ->select('cars.*')
            ->get();
    }
    public function scopeFilterByYear($query)
    {
        return $query->whereBetween('year',[Input::get()['start'],Input::get()['end']])->select('*')->get();
    }
}
