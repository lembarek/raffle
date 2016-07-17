<?php

namespace App\Repositories;

use App\Models\Raffle;

class RaffleRepository extends Repository
{

    protected $model;

    public function __construct(Raffle $model)
    {
        $this->model = $model;
    }

}
