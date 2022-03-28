<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SocialMedia;
use App\Http\Requests\Settings as SettingsRequest;

class SettingsController extends Controller
{
    //return settings page
    public function settings()
    {
        $settings = Settings::take(1)->first();
        $social = SocialMedia::get();
        return Inertia::render('Admin/Settings', ['settings' => $settings, 'social' => $social]);
    }

    //Update Settings Page
    public function upDateSettings(SettingsRequest $request)
    {
        if ($request->validated()) {
            $settings = Settings::take(1)->first();
            $settings->website_name = $request->input('website_name');
            $settings->website_email = $request->input('website_email');
            $settings->writers_contact_email = $request->input('writers_contact_email');
            $settings->website_phone = $request->input('website_phone');
            $settings->city = $request->input('city');
            $settings->country = $request->input('country');
            $settings->address = $request->input('address');
            $settings->postal_code = $request->input('postal_code');
            $settings->description = $request->input('description');
            $settings->save();

            $users = User::findOrFail(Auth::user()->id);
            $users->name = $request->input('name');
            $users->save();

            return redirect()->back()->with('success', 'Settings updated successfully');
        }
    }
}
