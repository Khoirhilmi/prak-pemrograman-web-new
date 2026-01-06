<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function loans()
    {
    return $this->hasMany(Loan::class);
    }

}
