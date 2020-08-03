<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function getRestaurants()
   {
       return $this->hasMany('App\Rastaurant', 'menu_id', 'id');
   }

}
