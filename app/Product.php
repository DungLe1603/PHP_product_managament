<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Notifiable;
    protected $table = "products";

    protected $fillable = [
        'name', 'id_category',
    ];
}
