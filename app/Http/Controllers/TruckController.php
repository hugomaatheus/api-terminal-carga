<?php

namespace App\Http\Controllers;

use App\Truck;
use App\Http\Resources\Truck as TruckResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TruckController extends Controller
{

    public function index()
    {
        return TruckResource::collection(Truck::paginate());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kind' => 'required|numeric|min:1|max:5'
        ]);

        $truck = Truck::create($data);

        return (new TruckResource($truck))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Truck $truck)
    {
        return new TruckResource($truck);
    }

    public function update(Request $request, Truck $truck)
    {
        $data = $request->validate([
            'kind' => 'required|numeric|min:1|max:5'
        ]);

        $truck->update($data);

        return new TruckResource($truck);
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();

        return response()->json(null, 204);
    }
}
