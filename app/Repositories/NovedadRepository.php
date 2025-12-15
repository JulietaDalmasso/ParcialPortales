<?php

namespace App\Repositories;

interface NovedadRepository
{
    public function insert(array $data);

    public function update(mixed $pk, array $data);

    public function delete(mixed $pk);

    public function find(mixed $pk);

    public function all();
}
