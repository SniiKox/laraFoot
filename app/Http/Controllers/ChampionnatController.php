<?php

namespace App\Http\Controllers;

use App\Championnat;
use Illuminate\Http\Request;

class ChampionnatController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->only('create','edit','delete');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championnats = Championnat::all();

        return view('pages.championnats.index',compact('championnats'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.championnats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'pays' => 'required',
        ]);

        Championnat::create($request->all());

        flashy('Le championnat a été ajouté avec succès !');

        return redirect()->route('championnats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function show(Championnat $championnat)
    {
        return view('pages.championnats.show',compact('championnat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function edit(Championnat $championnat)
    {
        return view('pages.championnats.edit',compact('championnat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championnat $championnat)
    {
        $request->validate([
            'libelle' => 'required',
            'pays' => 'required',
        ]);

        $championnat->update($request->all());

        flashy('Le championnat a été modifié avec succès !');

        return redirect()->route('championnats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Championnat  $championnat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championnat $championnat)
    {
        $championnat->delete();

        flashy('Le championnat a été supprimé avec succès !');

        return redirect()->route('championnats.index');
    }
}
