<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $user = Auth::user();

        $this->authorize('create');
        // if($user->can('create',Provider::class)){
        //     Response::allow();
        // } else {
        //     Response::deny('No se puede');
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $provider = new Provider();
        $provider->title = $request->get('title');
        $provider->contents = $request->get('contents');
        $provider->user_id = $user->id;

        $provider->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {

        $validateData=$request->validate([
            'title' => 'string|unique:posts|max:90',
            'contents' => 'string'
        ]);

        $provider->update($validateData);
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return back();
    }
}
