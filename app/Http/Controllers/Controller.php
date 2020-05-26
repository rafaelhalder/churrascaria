<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function homepage(){


    $variavel = 'Home do xita';



    return view('welcome',
        ['title' => $variavel]
);

    }

    public function cadastro(){
        echo "cadastro";
    }

    //method to user login view
    public function login(){
        return view('user.login');
    }

}
