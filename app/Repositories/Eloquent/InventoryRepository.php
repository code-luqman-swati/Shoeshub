<?php

namespace App\Repositories\Eloquent;

use App\Models\ShoeVariant;
use App\Repositories\Interfaces\InventoryRepositoryInterface;

class InventoryRepository implements InventoryRepositoryInterface
{
    public function getAll($perPage = 10)
    {
        return ShoeVariant::with([
            'shoe.brand',
            'size',
            'color'
        ])->latest()->paginate($perPage);
    }

    public function findById(int $id)
    {
        return ShoeVariant::with([
            'shoe.brand',
            'size',
            'color'
        ])->findOrFail($id);
    }

    public function updateStock(int $id, int $stock)
    {
        $variant = ShoeVariant::findOrFail($id);

        $variant->update([
            'stock' => $stock
        ]);

        return $variant;
    }
}