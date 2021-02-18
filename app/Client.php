<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function users() {
        return $this->belongsTo('App\User', 'main_user_id', 'id');
    }
    
    public function customers() {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function products() {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function paids() {
        return $this->belongsTo('App\User', 'paid_user_id', 'id');
    }
}
