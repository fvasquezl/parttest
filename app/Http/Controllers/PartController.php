<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepartRequest;
use App\Http\Requests\UpdatepartRequest;
use App\Models\Part;
use Illuminate\Http\Request;


class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        return view('parts.edit', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepartRequest  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {

        $part->name = $request['name'];
        $part->other = $request['other'];
        $part->complete = 1;
        $part->save();

        $kit = $part->kit_id;
        $partRest = Part::where('kit_id',$kit)->where('complete',0)->first();


        if ($partRest) {
            return redirect()->route('parts.edit',$partRest);
        }
        return redirect()->route('kits.create');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        //
    }
}
