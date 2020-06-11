<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    Protected $fillable=['brand_name','brand_description','publication_status'];
}
