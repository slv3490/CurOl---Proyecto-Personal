<?php

namespace App\Repository\BaseRepository;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository {
    protected Model $model;
    //Prueba de como trabajar con repositorios bases para reutilizacion como por ejemplo en un crud
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function whereWithPerPage(string $condition1, string|int $condition2, ?int $perPage = null): Collection|LengthAwarePaginator
    {
        $query = $this->model->query()->where($condition1, $condition2);
        if($perPage === null) {
            $query = $query->get();
        } else {
            $query = $query->paginate($perPage);
        }

        return $query;
    }

    public function find(int $id): Model {
        return $this->model::find($id);
    }
}