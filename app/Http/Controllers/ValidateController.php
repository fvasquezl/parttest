<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Kit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ValidateController extends Controller
{

    public function box_kits(Request $request)
    {
        if(Str::substr($request->data, 0,3) == 'kit'){
            return $this->kit($request->data);
        }

        if(Str::substr($request->data, 0,3) == 'box'){
            return $this->box($request->data);
        }

        return response()->json(
            'false'
        );
    }
    public function box(Request $request)
    {
        $box = Box::whereName($request->data)->first();
        if ($box){
            return response()->json([
                'id' => $box->id,
                'name' => $box->name,
            ]);
        }

        return response()->json(
            'The Box doesnt exists'
        );


    }


    public function kit(Request $request)
    {
        $kit = Kit::whereName($request->data)->first();
        if ($kit){
            return response()->json([
                'id' => $kit->id,
                'name' => $kit->name,
            ]);
        }

        return response()->json(
            'The Kit doesnt exists'
        );
    }


}
