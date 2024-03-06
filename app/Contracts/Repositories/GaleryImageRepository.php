<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\GaleryImageInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\GaleryImage;

class GaleryImageRepository extends BaseRepository implements GaleryImageInterface
{
    public function __construct(GaleryImage $galeryImage)
    {
        $this->model  = $galeryImage;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }
}