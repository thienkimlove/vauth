<?php

namespace Thienkimlove\Vauth\Models;

use Illuminate\Database\Eloquent\Model;
use Thienkimlove\Vauth\Contracts\Post as PostContracts;

class Post extends Model implements PostContracts
{
    protected $fillable = ['title', 'body'];
}
