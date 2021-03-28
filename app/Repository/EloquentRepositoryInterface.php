<?php


namespace App\Repository;


interface EloquentRepositoryInterface
{
    public function all();
    public function find(int $id);
}
