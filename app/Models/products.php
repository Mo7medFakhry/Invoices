<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    protected $guarded = [];
    public function sections()
    {
        return $this->belongsTo(sections::class,'section_id');
    }
}
