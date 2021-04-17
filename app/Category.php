<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Multitenantable;

    public function items()
    {
        return $this->belongsToMany(Item::class, 'category_item');
    }
}
