<?php

namespace App\Services;

use App\Repositories\Interfaces\VehiculoInterface;

class VehiculoService
{
    protected $vehiculoRepository;

    public function __construct(VehiculoInterface $vehiculoRepository)
    {
        $this->vehiculoRepository = $vehiculoRepository;
    }

    public function getAll()
    {
        return $this->vehiculoRepository->getAll();
    }

    public function getById($id)
    {
        return $this->vehiculoRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->vehiculoRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->vehiculoRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->vehiculoRepository->delete($id);
    }
}










