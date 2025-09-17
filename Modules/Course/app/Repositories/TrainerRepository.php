<?php

namespace Modules\Course\Repositories;

use Modules\Course\Models\Trainer;

class TrainerRepository
{
    public function all()
    {
        return Trainer::all();
    }

    public function find($id)
    {
        return Trainer::findOrFail($id);
    }

    public function create(array $data)
    {
        return Trainer::create($data);
    }

    public function update($id, array $data)
    {
        $trainer = $this->find($id);
        $trainer->update($data);
        return $trainer;
    }

    public function delete($id)
    {
        $trainer = $this->find($id);
        return $trainer->delete();
    }
}
