<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Technology;
use App\Models\Grado;
use Prophecy\Call\Call;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::paginate(30);
       // $candidates->cv = storage_path("/app/cv" . $candidates['cv']);
       // $path = Storage::url("app/cv" . $candidates['cv']);
        // $urls = Storage::url('path');
       // $paths = storage_path("app/cv/" . "$candidates->cv");
       // Storage::download("paths");
        return view('candidatos.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnologias = Technology::all();
        $candidatos = Candidate::all();
        $grados = Grado::all();
      //$grados = Grado::all()->pluck('name');

       
     
        return view('candidatos.crear', compact('tecnologias', 'candidatos', 'grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Grado $grado)
    {
        $request->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'cv' => 'required|mimes:pdf,docx,doc|max:4096',
        ]);

        //$grado = Grado::

        $candidato = new Candidate();

        $candidato->name = $request->name;
        $candidato->apellidos = $request->apellidos;
        $candidato->email = $request->email;
        $candidato->password = isset($request->password) ? bcrypt($request->password) : $candidato->password;
        $candidato->resumen = $request->resumen;
        $candidato->telefono1 = $request->telefono1;
        $candidato->telefono2 = $request->telefono2;
        $candidato->cv = $request->cv;
      //  $candidato->grado_id = $grado->id;
       
        $candidato->grado_id = Candidate::where('grado_id', '$grado->id')->get();

      //  $candidato->grado_id = $grado->id;
        
        if ($request->hasFile('cv')) {

            //$candidato['cv'] = $request->file('cv')->getClientOriginalName();
            $candidato['cv'] = $request->file('cv')->getClientOriginalName();
            $request->file('cv')->storeAs('cv', $candidato['cv']);
        }  

        $candidato->save();
        $candidato->technologies()->sync($request->tecnologias); 
        
        // return redirect()->route('candidatos.edit', $candidato)
        //                 ->with('info', 'Solicitud creada con éxito');

        return redirect()->route('candidatos.index')
                         ->with('info', 'Solicitud creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Candidate $candidates)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidato)
    {
        $tecnologias = Technology::all();
        //$candidatoskills = $candidate->technologies()->pluck('name');
        
        return view('candidatos.editar', compact('candidato', 'tecnologias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidato)
    {
        $this->validate($request, [
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'cv' => 'required|mimes:doc,pdf,docx,zip|max:4096',
        ]);

        $candidato->name = $request->name;
        $candidato->apellidos = $request->apellidos;
        $candidato->email = $request->email;
        $candidato->password = $request->password;
        $candidato->resumen = $request->resumen;
        $candidato->telefono1 = $request->telefono1;
        $candidato->telefono2 = $request->telefono2;
        $candidato->cv = $request->cv;
 
        if ($request->hasFile('cv')) {

            $candidato['cv'] = $request->file('cv')->getClientOriginalName();
            $request->file('cv')->storeAs('cv', $candidato['cv']);
        }

        $candidato->update();
        $candidato->technologies()->sync($request->tecnologias);

        return redirect()->route('candidatos.edit', $candidato)
            ->with('info', 'La solicitud se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidato)
    {
        $candidato->delete();

        return redirect()->route('candidatos.index')->with('info', 'La solicitud se ha eliminado satisfactoriamente');
    }
}
