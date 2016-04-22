<?php

namespace Thienkimlove\Vauth;
use Illuminate\Http\Request;
use App\Http\Requests;

class PostsController extends VauthController
{

    public function index()
    {
        return 'list post';
    }
}
