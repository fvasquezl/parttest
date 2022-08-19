<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function show(Kit $kit): Factory|View|Application
    {
        return view('qrcode.show',compact('kit'));
    }
}
