<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::firstOrCreate(
    [],
    [
        'site_name' => 'ShoeHub',
    ]
);

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'footer_description' => 'nullable|string',

            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email',

            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',

            'developer_name' => 'nullable|string|max:255',
            'developer_title' => 'nullable|string|max:255',
            'developer_email' => 'nullable|email',
            'developer_github' => 'nullable|url',
            'developer_linkedin' => 'nullable|url',
            'developer_portfolio' => 'nullable|url',

            'copyright' => 'nullable|string',

            'site_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $setting = Setting::first();

        $data = $request->except('site_logo');

        if ($request->hasFile('site_logo')) {

            if ($setting->site_logo && Storage::disk('public')->exists($setting->site_logo)) {
                Storage::disk('public')->delete($setting->site_logo);
            }

            $data['site_logo'] = $request->file('site_logo')->store('settings', 'public');
        }

        $setting->update($data);

        return redirect()
            ->route('settings.edit')
            ->with('success', 'Website settings updated successfully.');
    }
}