<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activity = Activity::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = Activity::find($id);
        if($activity)  // si la actividad existe
        {
           $activity->update($request->all());
           session()->flash('message', 'Registro actualizado exitosamente');

        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado'); 
        }
        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::find($id); 
        if($activity)  // si la actividad existe
        {
           $activity->delete(); //delete from causal where id = x
           session()->flash('message', 'Registro eliminado exitosamente');

        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado'); 
        }
        return redirect()->route('activity.index');
    }
}
