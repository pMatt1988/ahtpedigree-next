<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Dog;

class DogRepository extends ModuleRepository
{
    use HandleMedias, HandleRevisions;

    public function __construct(Dog $model)
    {
        $this->model = $model;
    }
}
