<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObservationController extends Controller
{
    private $rules =[
        'description' =>'required|string|max:100|min:3',
        
    ];

    private $traductionAtributes = [
        'description' => 'descripción',  

    ];


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $observations = Observation::all();    //select * from causal
        //dd($causals);
        return view('observation.index', compact('observations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('observation.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAtributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('observation.create')->withInput()->withErrors($errors);
        }
        $observation = Observation::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('observation.index');
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
        $observation = Observation::find($id);
        if($observation)
        {
            return view('observation.edit', compact('observation'));
        }
        else
        {
            return redirect()->route('observation.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAtributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('observation.edit', $id)->withInput()->withErrors($errors);
        }


        $observation = Observation::find($id);
        if($observation)
        {
            $observation->update($request->all()); //Delete from causal where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            return redirect()->route('observation.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');

        }

        return redirect()->route('observation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $observation = Observation::find($id);
        if($observation)
        {
            $observation->delete(); //Delete from observation where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            return redirect()->route('observation.index');
            session()->flash('warning', 'No se encuentra el registro solicitado');

        }

        return redirect()->route('observation.index');
    }
}
