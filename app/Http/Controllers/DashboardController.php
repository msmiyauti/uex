<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contatos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {

        $contatos = Contatos::all(['nome', 'cidade', 'latitude', 'longitude']);
        $contatos->count();
        return view('dashboard', [
            'contatos' => json_encode($contatos->toArray()),
        ]);
    }

   
}
