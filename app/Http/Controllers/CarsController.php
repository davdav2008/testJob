<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use App\Model\CarModel;
use App\Model\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CarsController extends Controller {

    public function index() {
        $sort = Input::get('sort');
        switch ($sort) {
            case 'id':
                $cars = Car::all()->sortBy('Id');
                break;
            case 'brand':
                $cars = Car::sortByBrand();
                break;
            case 'model':
                $cars = Car::sortByModel();

                break;
            case 'category':
                $cars = Car::all()->sortBy('category_id');
                break;
            case 'price':
                $cars = Car::all()->sortBy('Id');
                break;
            default:
                $cars = Car::all();
                break;
        }

        return view('index', compact('cars'));
    }

    public function create() {
        return view('car.create', ['Brand' => Brand::all(), 'Model' => CarModel::all()]);
    }


    public function store(Request $request) {
        $data = $request->all();

        $car = new Car;
        $car->fill($data);

        $car->brand_id = DB::table('brands')->whereName($data['Brand'])->get()->pluck('id')[0];
        $car->car_model_id = DB::table('car_models')->whereName($data['Model'])->get()->pluck('id')[0];

        if ($car->year < 1990) {
            $car->category_id = 1;
        } elseif ($car->year >= 1990 && $car->year < 2000) {
            $car->category_id = 2;
        } elseif ($car->year >= 2000 && $car->year < 2010) {
            $car->category_id = 3;
        } elseif ($car->year >= 2010) {
            $car->category_id = 4;
        }

        $car->save();
        return redirect()->route('car.create');
    }

    public function sortById() {
        return view('index', ['cars' => Car::all()->sortBy('Id')]);
    }

    public function sortByBrand() {
        $cars = Car::sortByBrand();
        return view('index', ['cars' => $cars]);
    }

//
    public function sortByModel() {

        $cars = Car::sortByModel();
        return view('index', ['cars' => $cars]);
    }

    public function sortByCategory() {
        return view('index', ['cars' => Car::all()->sortBy('category_id')]);
    }

    public function sortByPrice() {
        return view('index', ['cars' => Car::all()->sortBy('price')]);
    }

    public function filter() {
        $cars = Car::FilterByYear();
        return view('index', ['cars' => $cars]);
    }

}
