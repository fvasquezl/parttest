<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorekitRequest;
use App\Http\Requests\UpdatekitRequest;
use App\Models\Kit;
use App\Models\Part;
use App\Models\PartReference;
use Illuminate\Http\Request;

class KitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kits = Kit::all();
        return view('kits.index',compact('kits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kit = new Kit();
        $kit->fill([
            'category_id' => $request['category_id'],
            'sub_category_id' => $request['sub_category_id'],
            'name' => $request['name'],
        ]);
        $kit->save();

        $parts = PartReference::select('name')
            ->where('category_id',$kit->category_id)
            ->where('sub_category_id',$kit->sub_category_id)
            ->get();

        foreach($parts as $part){
            Part::create([
               'kit_id' => $kit->id,
                'name' => $part->name,
                'complete' => 0
            ]);
        }
        $part = Part::where('kit_id',$kit->id)->first();

        return redirect()->route('parts.edit',$part);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kit  $kit
     * @return \Illuminate\Http\Response
     */
    public function show(kit $kit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kit  $kit
     * @return \Illuminate\Http\Response
     */
    public function edit(kit $kit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekitRequest  $request
     * @param  \App\Models\kit  $kit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekitRequest $request, kit $kit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kit  $kit
     * @return \Illuminate\Http\Response
     */
    public function destroy(kit $kit)
    {
        //
    }
}
