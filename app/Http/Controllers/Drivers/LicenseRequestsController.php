<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LicenseRequestsController extends Controller
{
    public function index($driver_id){
        return view('drivers.sendLicenseRequest');
    }

    public function store($driver_id){
        return redirect()->back()->with(['success' => 'Request Sent Successfully']);
    }
}
