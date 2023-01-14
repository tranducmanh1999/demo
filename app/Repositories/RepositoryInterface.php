<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function find($id);
    
    public function create(array $attribute);

    // public function edit($id, array $attribute);

    public function delete($id);
}