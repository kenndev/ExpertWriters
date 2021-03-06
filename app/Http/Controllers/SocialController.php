<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SocialRequest;
use App\Models\SocialMedia;
use Inertia\Inertia;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialRequest $request)
    {
        $social = SocialMedia::create($request->validated());
        return redirect()->back()->with('success', $request->input('social_name') . ' added successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialRequest $request, $id)
    {
        $social = SocialMedia::findOrFail($id);
        $social->update($request->validated());
        return redirect()->back()->with('success', $request->input('social_name') . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = SocialMedia::findOrFail($id);
        $social->delete();
        return redirect()->back()->with('success', 'Record has been deleted successfully');
    }
}
