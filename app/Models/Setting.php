<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        // Store
        'site_name',
        'site_logo',
        'footer_description',

        // Contact
        'address',
        'phone',
        'email',

        // Social
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'youtube',

        // Developer
        'developer_name',
        'developer_title',
        'developer_email',
        'developer_github',
        'developer_linkedin',
        'developer_portfolio',

        // Footer
        'copyright',
    ];
}