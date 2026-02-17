<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VehiculoService;

class VehiculoController extends Controller
{
    protected $vehiculoService;

    public function __construct(VehiculoService $vehiculoService)
    {
        $this->vehiculoService = $vehiculoService;
    }

    public function index()
    {
        return response()->json($this->vehiculoService->getAll());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'version' => 'required|string|max:255',
            'anio' => 'required|integer|min:1886|max:' . date('Y'),
        ]);

        return response()->json($this->vehiculoService->create($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->vehiculoService->getById($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'marca' => 'sometimes|string|max:255',
            'modelo' => 'sometimes|string|max:255',
            'color' => 'sometimes|string|max:255',
            'version' => 'sometimes|string|max:255',
            'anio' => 'sometimes|integer|min:1886|max:' . date('Y'),
        ]);

        return response()->json($this->vehiculoService->update($id, $data));
    }

    public function destroy($id)
    {
        $this->vehiculoService->delete($id);
        return response()->json(null, 204);
    }
}
