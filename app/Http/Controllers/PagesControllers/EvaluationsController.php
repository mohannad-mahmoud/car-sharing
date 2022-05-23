<?php

namespace App\Http\Controllers\PagesControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{

    /**
     * Get the evaluations view page
     * */
    public function index(){
        return view('evaluations');
    }
}
