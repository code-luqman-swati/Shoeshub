<?php

namespace App\Services;

use App\Repositories\Interfaces\InventoryRepositoryInterface;

class InventoryService
{
    protected $inventoryRepository;

    public function __construct(
        InventoryRepositoryInterface $inventoryRepository
    ) {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function getAllInventory()
    {
        return $this->inventoryRepository->getAll();
    }

    public function getInventoryById($id)
    {
        return $this->inventoryRepository->findById($id);
    }

    public function updateStock($id, $stock)
    {
        return $this->inventoryRepository
            ->updateStock($id, $stock);
    }

    public function getStockStatus($stock)
    {
        if ($stock == 0) {
            return 'Out of Stock';
        }

        if ($stock <= 5) {
            return 'Low Stock';
        }

        return 'In Stock';
    }
}