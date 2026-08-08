<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
      

            $permissions = [

    // ======================
    // Dashboard
    // ======================
    [
        'name' => 'View Dashboard',
        'slug' => 'dashboard.view',
    ],


    // ======================
    // Employees
    // ======================
    [
        'name' => 'View Employees',
        'slug' => 'employee.view',
    ],
    [
        'name' => 'Create Employee',
        'slug' => 'employee.create',
    ],
    [
        'name' => 'Edit Employee',
        'slug' => 'employee.edit',
    ],
    [
        'name' => 'Delete Employee',
        'slug' => 'employee.delete',
    ],



    // ======================
    // Categories
    // ======================
    [
        'name' => 'View Categories',
        'slug' => 'category.view',
    ],
    [
        'name' => 'Create Category',
        'slug' => 'category.create',
    ],
    [
        'name' => 'Edit Category',
        'slug' => 'category.edit',
    ],
    [
        'name' => 'Delete Category',
        'slug' => 'category.delete',
    ],



    // ======================
    // Brands
    // ======================
    [
        'name' => 'View Brands',
        'slug' => 'brand.view',
    ],
    [
        'name' => 'Create Brand',
        'slug' => 'brand.create',
    ],
    [
        'name' => 'Edit Brand',
        'slug' => 'brand.edit',
    ],
    [
        'name' => 'Delete Brand',
        'slug' => 'brand.delete',
    ],



    // ======================
    // Products / Shoes
    // ======================
    [
        'name' => 'View Products',
        'slug' => 'product.view',
    ],
    [
        'name' => 'Create Product',
        'slug' => 'product.create',
    ],
    [
        'name' => 'Edit Product',
        'slug' => 'product.edit',
    ],
    [
        'name' => 'Delete Product',
        'slug' => 'product.delete',
    ],



    // ======================
    // Product Images
    // ======================
    [
        'name' => 'Manage Product Images',
        'slug' => 'product.image.manage',
    ],



    // ======================
    // Sizes
    // ======================
    [
        'name' => 'View Sizes',
        'slug' => 'size.view',
    ],
    [
        'name' => 'Manage Sizes',
        'slug' => 'size.manage',
    ],



    // ======================
    // Colors
    // ======================
    [
        'name' => 'View Colors',
        'slug' => 'color.view',
    ],
    [
        'name' => 'Manage Colors',
        'slug' => 'color.manage',
    ],



    // ======================
    // Shoe Variants
    // ======================
    [
        'name' => 'View Variants',
        'slug' => 'variant.view',
    ],
    [
        'name' => 'Manage Variants',
        'slug' => 'variant.manage',
    ],



    // ======================
    // Inventory
    // ======================
    [
        'name' => 'View Inventory',
        'slug' => 'inventory.view',
    ],
    [
        'name' => 'Update Inventory',
        'slug' => 'inventory.update',
    ],



    // ======================
    // Purchases
    // ======================
    [
        'name' => 'View Purchases',
        'slug' => 'purchase.view',
    ],
    [
        'name' => 'Create Purchase',
        'slug' => 'purchase.create',
    ],
    [
        'name' => 'Edit Purchase',
        'slug' => 'purchase.edit',
    ],
    [
        'name' => 'Delete Purchase',
        'slug' => 'purchase.delete',
    ],



    // ======================
    // Suppliers
    // ======================
    [
        'name' => 'View Suppliers',
        'slug' => 'supplier.view',
    ],
    [
        'name' => 'Manage Suppliers',
        'slug' => 'supplier.manage',
    ],



    // ======================
    // Sales
    // ======================
    [
        'name' => 'View Sales',
        'slug' => 'sale.view',
    ],
    [
        'name' => 'Create Sale',
        'slug' => 'sale.create',
    ],



    // ======================
    // Orders
    // ======================
    [
        'name' => 'View Orders',
        'slug' => 'order.view',
    ],
    [
        'name' => 'Update Orders',
        'slug' => 'order.update',
    ],



    // ======================
    // Payments
    // ======================
    [
        'name' => 'View Payments',
        'slug' => 'payment.view',
    ],
    [
        'name' => 'Refund Payment',
        'slug' => 'payment.refund',
    ],



    // ======================
    // Customers
    // ======================
    [
        'name' => 'View Customers',
        'slug' => 'customer.view',
    ],
    [
        'name' => 'Update Customer Status',
        'slug' => 'customer.update',
    ],



    // ======================
    // Users
    // ======================
    [
        'name' => 'Manage Users',
        'slug' => 'user.manage',
    ],

];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}