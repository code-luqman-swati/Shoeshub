<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::where('slug', 'admin')->first();
        $finance = Role::where('slug', 'finance')->first();
        $inventory = Role::where('slug', 'inventory')->first();
        $sales = Role::where('slug', 'sales')->first();


        /*
        |--------------------------------------------------------------------------
        | Admin - All Permissions
        |--------------------------------------------------------------------------
        */

        $admin->permissions()->sync(
            Permission::pluck('id')->toArray()
        );



        /*
        |--------------------------------------------------------------------------
        | Finance Permissions
        |--------------------------------------------------------------------------
        */

        $financePermissions = Permission::whereIn('slug', [

            'dashboard.view',

            // Purchases
            'purchase.view',
            'purchase.create',

            // Sales
            'sale.view',
            'sale.create',

            // Orders
            'order.view',
            'order.update',

            // Inventory View
            'inventory.view',

        ])->pluck('id')->toArray();


        $finance->permissions()->sync($financePermissions);




        /*
        |--------------------------------------------------------------------------
        | Inventory Permissions
        |--------------------------------------------------------------------------
        */

        $inventoryPermissions = Permission::whereIn('slug', [

            'dashboard.view',

            // Categories
            'category.view',

            // Brands
            'brand.view',

            // Products
            'product.view',
            'product.create',
            'product.edit',
            'product.image.manage',

            // Sizes
            'size.view',
            'size.manage',

            // Colors
            'color.view',
            'color.manage',

            // Variants
            'variant.view',
            'variant.manage',

            // Inventory
            'inventory.view',

        ])->pluck('id')->toArray();


        $inventory->permissions()->sync($inventoryPermissions);




        /*
        |--------------------------------------------------------------------------
        | Sales Permissions
        |--------------------------------------------------------------------------
        */

        $salesPermissions = Permission::whereIn('slug', [

            'dashboard.view',

            // Products
            'product.view',

            // Sales
            'sale.view',
            'sale.create',

            // Orders
            'order.view',
            'order.update',

        ])->pluck('id')->toArray();


        $sales->permissions()->sync($salesPermissions);

    }
}