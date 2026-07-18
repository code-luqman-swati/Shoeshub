<?php

namespace App\Repositories\Interfaces;

interface InventoryRepositoryInterface
{
    public function getAll($perPage = 10);

    public function findById(int $id);

    public function updateStock(int $id, int $stock);
}