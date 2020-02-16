<?php

namespace TES\Cartli\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('cartli::dashboard', ['user' => $user]);
    }
}
