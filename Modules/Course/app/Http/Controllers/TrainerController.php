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

    // Index - list all trainers
    public function index()
    {
        $trainers = $this->trainerService->all();
        return view('course::backend.trainers.index', compact('trainers'));
    }

    // Create - show form
    public function create()
    {
        return view('course::backend.trainers.create');
    }

    // Store - save new trainer
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:trainers,email',
            'phone' => 'required|string',
            'expertise' => 'required|string',
        ]);

        $this->trainerService->create($data);
        return redirect()->route('trainers.index')->with('success', 'Trainer created successfully.');
    }

    // Edit - show edit form
    public function edit($id)
    {
        $trainer = $this->trainerService->find($id);
        return view('course::backend.trainers.edit', compact('trainer'));
    }

    // Update - save edited trainer
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:trainers,email,'.$id,
            'phone' => 'required|string',
            'expertise' => 'required|string',
        ]);

        $this->trainerService->update($id, $data);
        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
    }

    // Destroy - delete trainer
    public function destroy($id)
    {
        $this->trainerService->delete($id);
        return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}
