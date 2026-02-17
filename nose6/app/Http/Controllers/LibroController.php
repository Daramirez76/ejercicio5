<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LibroService;

class LibroController extends Controller
{
     protected $libroService;

    public function __construct(LibroService $libroService)
    {
        $this->libroService = $libroService;
    }
    public function index()
    {
        $libros = $this->libroService->getAllLibros();
        return response()->json($libros);
    }
    public function show($id)
    {
        $libro = $this->libroService->getLibroById($id);
        if ($libro) {
            return response()->json($libro);
        }
        return response()->json(['message' => 'Libro not found'], 404);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:0|max:' . date('Y'),
            'genre' => 'required|string|max:255',
        ]);

        $libro = $this->libroService->createLibro($data);
        return response()->json($libro, 201);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'author' => 'sometimes|string|max:255',
            'year' => 'sometimes|integer|min:0|max:' . date('Y'),
            'genre' => 'sometimes|string|max:255',
        ]);

        $libro = $this->libroService->updateLibro($id, $data);
        if ($libro) {
            return response()->json($libro);
        }
        return response()->json(['message' => 'Libro not found'], 404);
    }
    public function destroy($id)
    {
        $deleted = $this->libroService->deleteLibro($id);
        if ($deleted) {
            return response()->json(['message' => 'Libro deleted successfully']);
        }
        return response()->json(['message' => 'Libro not found'], 404);
    }
}
