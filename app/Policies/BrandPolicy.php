<?php

namespace App\Policies;

use App\Models\Brand;
use App\Models\User;

class BrandPolicy
{
    /**
     * Determine whether the user can view any brands.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('brand.view');
    }

    /**
     * Determine whether the user can view a brand.
     */
    public function view(User $user, Brand $brand): bool
    {
        return $user->hasPermission('brand.view');
    }

    /**
     * Determine whether the user can create brands.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('brand.create');
    }

    /**
     * Determine whether the user can update a brand.
     */
    public function update(User $user): bool
    {
        return $user->hasPermission('brand.edit');
    }

    /**
     * Determine whether the user can delete a brand.
     */
    public function delete(User $user, Brand $brand): bool
    {
        return $user->hasPermission('brand.delete');
    }
}