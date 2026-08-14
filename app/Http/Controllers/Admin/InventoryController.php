<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInventoryRequest;
use App\Services\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    protected $inventoryService;

    public function __construct(
        InventoryService $inventoryService
    ) {
        $this->inventoryService = $inventoryService;
    }
public function index(Request $request)
{
    if($request->filter == 'low-stock') {

        $variants = $this->inventoryService
            ->getLowStockInventory();

    } else {

        $variants = $this->inventoryService
            ->getAllInventory();

    }


    if($request->search){

        $variants = $variants->filter(function($variant) use ($request){

            return str_contains(
                strtolower($variant->shoe->name),
                strtolower($request->search)
            );

        });

    }



    if($request->ajax()){

        return view(
            'admin.inventory.table',
            compact('variants')
        );

    }



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


public function update(Request $request, $id)
{
    $this->inventoryService
        -> updateStock($id, $stock = $request->stock);

    return redirect()
        ->route('admin.inventory.index')
        ->with('success', 'Inventory updated successfully.');
}

}