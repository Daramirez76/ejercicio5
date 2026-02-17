<?php
namespace App\Repositories\Eloquent;
use App\Models\Libro;
use App\Repositories\Interfaces\LibroInterface;

class LibroRepository implements LibroInterface
{
    protected $model;

    public function __construct(Libro $model)
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
        $libro = $this->model->find($id);
        if ($libro) {
            $libro->update($data);
            return $libro;
        }
        return null;
    }
    public function delete($id)
    {
        $libro = $this->model->find($id);
        if ($libro) {
            return $libro->delete();
        }
        return false;
    }
}



