<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use Notifiable;
    protected $table = "images";

    protected $fillable = [
        'name', 'id_product',
    ];
}
