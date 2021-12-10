<?php

namespace App\Services;

use App\Repositories\MetierRepository;

class MetierService
{
    private $metierRepository;

    public function __construct(MetierRepository $metierRepository)
    {
        $this->metierRepository = $metierRepository;
    }

    public function create($data)
    {
        return $this->metierRepository->create($data);
    }

    public function getAllNames()
    {
        return $this->metierRepository->getAllNames();
    }

}
