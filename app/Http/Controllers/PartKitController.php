<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Models\Part;
use Illuminate\Http\Request;

class PartKitController extends Controller
{
    public function edit(Part $part,Kit $kit)
    {
        dd($part);
    }
}
