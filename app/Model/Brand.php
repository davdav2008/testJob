<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {
    protected $table = 'brands';

    public function Model() {
        return $this->hasMany('App/Car_Model');
    }

}
