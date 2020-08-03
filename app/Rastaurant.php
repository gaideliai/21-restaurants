<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rastaurant extends Model
{
    public function getMenus()
   {
       return $this->belongsTo('App\Menu', 'menu_id', 'id');
   }

}
