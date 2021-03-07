<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InicioController extends Controller
{
    public function index()
    {
        // Mostrar recetas con más likes
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        $nuevas = Receta::latest()->take(5)->get();

        // Obtener todas las categorías
        $categorias = CategoriaReceta::all();

        // Agrupar las recetas en las categorías
        $recetas = [];

        foreach($categorias as $categoria)
        {
            $recetas[Str::slug($categoria->nombre)][] = Receta::where('categoria_id', $categoria->id)->get();
        }

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
