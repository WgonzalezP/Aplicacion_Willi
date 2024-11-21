<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtenemos todos los archivos .svg de la carpeta public/assets/img/categorias
        $categorias = [];
        $path = public_path('assets/img/categorias');

        // Verificar que la carpeta exista
        if (File::exists($path)) {
            // Obtener todos los archivos SVG
            $files = File::allFiles($path);

            // Filtrar solo los archivos .svg
            foreach ($files as $file) {
                if ($file->getExtension() === 'svg') {
                    $categorias[] = [
                        'name' => pathinfo($file->getFilename(), PATHINFO_FILENAME), // Obtener solo el nombre sin la extensión
                        'file' => $file->getFilename()
                    ];
                }
            }
        }

        // Convertir el arreglo en una colección para usar chunk()
        $categoriasCollection = collect($categorias);

        // Pasar los datos a la vista
        return view('welcome', compact('categoriasCollection'));
    }
}
