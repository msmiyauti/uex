<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show dashboard.
     */
    public function index(Request $request): View
    {
        $api_token = $request->session()->get("api_token");
        return view('dashboard', ['api_token'=> $api_token]);
    }

   
}
