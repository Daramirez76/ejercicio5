<?php
namespace App\Services;
use App\Repositories\Interfaces\LibroInterface;

class LibroService
{
    protected $libroRepository;

    public function __construct(LibroInterface $libroRepository)
    {
        $this->libroRepository = $libroRepository;
    }

    public function getAllLibros()
    {
        return $this->libroRepository->getAll();
    }

    public function getLibroById($id)
    {
        return $this->libroRepository->getById($id);
    }

    public function createLibro(array $data)
    {
        return $this->libroRepository->create($data);
    }

    public function updateLibro($id, array $data)
    {
        return $this->libroRepository->update($id, $data);
    }

    public function deleteLibro($id)
    {
        return $this->libroRepository->delete($id);
    }
}

















