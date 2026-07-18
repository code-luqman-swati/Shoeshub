<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInventoryRequest;
use App\Services\InventoryService;

class InventoryController extends Controller
{
    protected $inventoryService;

    public function __construct(
        InventoryService $inventoryService
    ) {
        $this->inventoryService = $inventoryService;
    }

    public function index()
    {
        $variants = $this->inventoryService
            ->getAllInventory();

        return view(
            'admin.inventory.index',
            compact('variants')
        );
    }

    public function edit($id)
    {
        $variant = $this->inventoryService
            ->getInventoryById($id);

        return view(
            'admin.inventory.edit',
            compact('variant')
        );
    }

    public function update(
        UpdateInventoryRequest $request,
        $id
    ) {
        $this->inventoryService->updateStock(
            $id,
            $request->stock
        );

        return redirect()
            ->route('admin.inventory.index')
            ->with(
                'success',
                'Inventory updated successfully.'
            );
    }
}