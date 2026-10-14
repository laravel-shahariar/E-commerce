<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class DashboardController extends Controller
{
    public function home() {
        $total_product = product::all();
        return view("dashboard.home", compact("total_product"));
    }
}
