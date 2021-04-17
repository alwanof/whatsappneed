<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Multitenantable;
}
