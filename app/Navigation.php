<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Navigation extends Model
{
    use Multitenantable;
    //protected $appends = ['navigations'];
    public function navigation()
    {
        return $this->belongsTo(Navigation::class);
    }
    public function navigations()
    {
        return $this->hasMany(Navigation::class);
    }
}
