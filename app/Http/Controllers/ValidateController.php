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
    public function box($data)
    {
        $box = Box::whereName($data)->first();
        if ($box){
            return response()->json([
                'id' => $box->id,
                'type' => 'box',
                'created_at' => $box->created_at
            ]);
        }

        return response()->json(
             'false'
        );


    }


    public function kit($data)
    {
        $kit = Kit::whereName($data)->first();
        if ($kit){
            return response()->json([
                'id' => $kit->id,
                'type' => 'kit',
                'created_at' => $kit->created_at
            ]);
        }

        return response()->json(
            'false'
        );
    }


}
