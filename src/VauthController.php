<?php

namespace Thienkimlove\Vauth;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class VauthController extends Controller
{
    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $requestUri = request()->route();
        if ($requestUri) {
            $routeUri = $requestUri->getUri();
            $authorize = null;
            $determine = config('vauth')['authorization']['determine'];
            if (strpos($routeUri, $determine) !== false) {
                $authorize = $routeUri;
            } else {
                $action = array_last(explode('@', request()->route()->getActionName()));
                $authorize = $action. $determine. str_singular($routeUri);
            }
            $this->authorize($authorize);
        }
    }
}
