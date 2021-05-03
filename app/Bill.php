<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Bill extends Model
{
    use Multitenantable;
}
