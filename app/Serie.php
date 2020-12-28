<?php

namespace App;

use Illuminate\Databse\Eloquent\Model;

class Serie extends Model {
    public $timestamps =false;
    protected $fillable = ['nome'];
}