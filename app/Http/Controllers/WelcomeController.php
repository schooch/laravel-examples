<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Config\Repository;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function test(Repository $config){
        // constructor injection
        //return $this->config->get('database.default');

        // method injection
        //return \Config::get('database.default');
        return config('database.default'); // Suggested method, doesn't link to any concrete class

        // facade

        // config helper function

    }
}
