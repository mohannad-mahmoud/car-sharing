<?php

namespace App\Http\Controllers\PagesControllers;

use App\Helper\ModelsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Get the home view page
     * */
    public function index(){
        return ModelsHelper::getRidesToView('home');
    }

    /**
     * Get Our Terms view Page
     * */
    public function ourTerms(){
        return view('ourTerms');
    }
}
