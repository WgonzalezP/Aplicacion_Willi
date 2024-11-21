<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File; // Necesario para trabajar con archivos
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        // Obtener marcas
        $marcas = [];
        $pathMarcas = public_path('assets/img/marcas');

        if (File::exists($pathMarcas)) {
            $files = File::allFiles($pathMarcas);
            foreach ($files as $file) {
                if ($file->getExtension() === 'svg') {
                    $marcas[] = [
                        'name' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                        'file' => $file->getFilename()
                    ];
                }
            }
        }

        // Obtener categorías
        $categorias = [];
        $pathCategorias = public_path('assets/img/categorias');

        if (File::exists($pathCategorias)) {
            $files = File::allFiles($pathCategorias);
            foreach ($files as $file) {
                if ($file->getExtension() === 'svg') {
                    $categorias[] = [
                        'name' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                        'file' => $file->getFilename()
                    ];
                }
            }
        }

        // Convertir en colecciones para usar chunk()
        $marcas = collect($marcas);
        $categorias = collect($categorias);

        // Pasar las marcas y categorías a la vista
        return view('welcome', compact('marcas', 'categorias'));
    }
}
