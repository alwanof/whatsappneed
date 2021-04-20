<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Navigation extends Model
{
    use Multitenantable;
    public function navigation()
    {
        return $this->belongsTo(Navigation::class);
    }
}
