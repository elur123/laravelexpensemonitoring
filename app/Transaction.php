<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function users() {
        return $this->belongsTo('App\User', 'main_user_id', 'id');
    }
    
    public function suppliers() {
        return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
    }

    public function products() {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function paids() {
        return $this->belongsTo('App\User', 'paid_user_id', 'id');
    }
}
