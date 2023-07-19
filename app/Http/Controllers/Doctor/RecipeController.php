<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Medicament;
use App\Recipe;
use Illuminate\Http\Request;

use PDF;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date_order = $request->get('date_order');

        $recipes = Recipe::orderBy('id', 'desc')
            ->date_order($date_order)
            ->paginate(15);

        return view('recipes.index', compact('recipes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $recipesall = Medicament::all('codigo', 'descripcion');

        return view('recipes.edit', compact('recipe','recipesall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $data = $request->all();
        $recipe->fill($data);
        $recipe->save();

        $notification = 'Se ha guardado los examenes correctamente.';
        return back()->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function recetaMensual(Recipe $recipe)
    {
        $pdf = PDF::loadView('recipes.recetamensual', compact('recipe'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
