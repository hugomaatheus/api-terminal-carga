<?php

namespace App\Http\Controllers;

use App\Carman;
use App\Http\Resources\Carman as CarmanResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarmanController extends Controller
{

    public function index()
    {
        return CarmanResource::collection(Carman::paginate());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:18|max:100',
            'gender' => 'required|string|max:15',
            'cnh' => 'required|unique:carmen,cnh|min:11|max:11',
            'vehicleKind' => 'required|numeric|min:1|max:5',
            'full' => 'required|boolean',
            'gotVehicle' => 'required|boolean',
            'truck_id' => 'required'
        ]);

        $carman = Carman::create($data);

        return (new CarmanResource($carman))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Carman $carman)
    {
        return new CarmanResource($carman);
    }

    public function update(Request $request, Carman $carman)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:18|max:100',
            'gender' => 'required|string|max:15',
            'cnh' => [
                'required',
                'min:11',
                'max:11',
                Rule::unique('carmen')->ignore($carman->id),
            ],
            'vehicleKind' => 'required|numeric|min:1|max:5',
            'full' => 'required|boolean',
            'gotVehicle' => 'required|boolean'
        ]);

        $carman->update($data);

        return new CarmanResource($carman);
    }

    public function destroy(Carman $carman)
    {
        $carman->delete();

        return response()->json(null, 204);
    }
}
