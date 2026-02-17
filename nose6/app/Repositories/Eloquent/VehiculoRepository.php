<?php
namespace App\Repositories\Eloquent;
use App\Models\Vehiculo;
use App\Repositories\Interfaces\VehiculoInterface;

class VehiculoRepository implements VehiculoInterface
{
    protected $model;

    public function __construct(Vehiculo $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {   
        return $this->model->find($id);
    } 
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        $vehiculo = $this->model->find($id);
        if ($vehiculo) {
            $vehiculo->update($data);
            return $vehiculo;
        }
        return null;
    }
    public function delete($id)
    {
        $vehiculo = $this->model->find($id);
        if ($vehiculo) {
            return $vehiculo->delete();
        }
        return false;
    }
}













