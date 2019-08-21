<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelLog;
use App\Http\Resources\TravelLog as TravelResource;

class TravelController extends Controller
{
    
    public function index()
    {
        return TravelResource::collection(TravelLog::paginate());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'carman_id' => 'required',
            'start_x' => 'required|numeric',
            'start_y' => 'required|numeric',
            'destination_x' => 'required|numeric',
            'destination_y' => 'required|numeric',
            'travel' => 'required|date'
        ]);

        $travel = TravelLog::create($data);

        return (new TravelResource($travel))
            ->response()
            ->setStatusCode(201);
    }

    public function show(TravelLog $travel)
    {
        return new TravelResource($travel);
    }

    public function update(Request $request, TravelLog $travel)
    {
        $data = $request->validate([
            'carman_id' => 'required',
            'start_x' => 'required|numeric',
            'start_y' => 'required|numeric',
            'destination_x' => 'required|numeric',
            'destination_y' => 'required|numeric',
            'travel' => 'required|date'
        ]);

        $travel->update($data);

        return new TravelResource($travel);
    }

    public function destroy(TravelLog $travel)
    {
        $travel->delete();

        return response()->json(null, 204);
    }
}
