<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Services\TrainerService;

class TrainerController extends Controller
{
    protected $trainerService;

    public function __construct(TrainerService $trainerService)
    {
        $this->trainerService = $trainerService;
    }

    public function index()
    {
        $trainers = $this->trainerService->all();
        return response()->json($trainers);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:trainers,email',
            'phone' => 'required|string',
            'expertise' => 'required|string',
        ]);

        $trainer = $this->trainerService->create($data);
        return response()->json($trainer, 201);
    }

    public function show($id)
    {
        $trainer = $this->trainerService->find($id);
        return response()->json($trainer);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:trainers,email,'.$id,
            'phone' => 'sometimes|string',
            'expertise' => 'sometimes|string',
        ]);

        $trainer = $this->trainerService->update($id, $data);
        return response()->json($trainer);
    }

    public function destroy($id)
    {
        $this->trainerService->delete($id);
        return response()->json(['message' => 'Trainer deleted']);
    }
}
