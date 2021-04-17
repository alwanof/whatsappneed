<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Multitenantable;
    protected $appends = ['gallery'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_item');
    }

    public function getGalleryAttribute()
    {
        $res = [];
        for ($i = 1; $i < 5; $i++) {
            $prop = 'image' . $i;
            if ($this->$prop) {
                $res[] =  $this->$prop;
            }
        }
        return $res;
    }
}
