<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Notifiable;
    protected $table = "categories";

    protected $fillable = [
        'name',
    ];
}
