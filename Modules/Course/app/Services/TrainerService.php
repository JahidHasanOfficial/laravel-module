<?php

namespace Modules\Course\Services;

use Modules\Course\Repositories\TrainerRepository;

class TrainerService
{
    protected $trainerRepo;

    public function __construct(TrainerRepository $trainerRepo)
    {
        $this->trainerRepo = $trainerRepo;
    }

    public function all()
    {
        return $this->trainerRepo->all();
    }

    public function find($id)
    {
        return $this->trainerRepo->find($id);
    }

    public function create(array $data)
    {
        // এখানে ভ্যালিডেশন বা লগিক যোগ করা যায়
        return $this->trainerRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->trainerRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->trainerRepo->delete($id);
    }
}
