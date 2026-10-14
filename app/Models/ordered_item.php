<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordered_item extends Model
{
    public function order() {
        return $this->belongsTo(order::class);
    }

    public function product() {
        return $this->belongsTo(product::class);
    }
}
