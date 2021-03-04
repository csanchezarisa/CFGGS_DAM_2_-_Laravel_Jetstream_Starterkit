<?php

namespace App\Http\Controllers;

use App\Models\Apio;
use Illuminate\Http\Request;

class ApioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Apio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apio = Apio::create($request->all());
        $lastId = Apio::count();
        $apio->id = $lastId;
        $apioArr[] = $apio;
        $apio->update($apioArr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apio  $apio
     * @return \Illuminate\Http\Response
     */
    public function show(Apio $apio)
    {
        return response()->json($apio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apio  $apio
     * @return \Illuminate\Http\Response
     */
    public function edit(Apio $apio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apio  $apio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apio $apio)
    {
        $apio->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apio  $apio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apio $apio)
    {
        $id = $apio->id;
        $apios = Apio::all();
        if(Apio::count() > 1){
            foreach ($apios as $apioE) {
                $id2 = $apioE->id;
                if($id2 > $id + 1){
                    $apioE->id = $id2 - 1;
                    $apioArr[] = $apioE; 
                    $apioE->update($apioArr);
                }elseif ($id2 == $id + 1) {
                    $apio->delete();
                    $apioE->id = $id2 - 1;
                    $apioArr[] = $apioE;
                    $apioE->update($apioArr);
                }elseif ($id2 == $id){
                    $apio->delete();
                }
            }
        } else {
            $apio->delete();
        }
    }
}
