<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    use NewsTrait;
    public function index()
    {
        return \view('order.order');
    }
}
