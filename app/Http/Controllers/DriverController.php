<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public  function  show(Request $request)
    {
        /*return back the user and associate driver model*/
        $user = $request->user();
        $user->load('driver');

        return $user;
    }

    public  function  store(Request $request)
    {
        $request->validate([
           'year' => 'required|numeric|between:2010,2014',
           'make' => 'required',
           'model' => 'required',
           'color'         => 'required|alpha',
           'licence_plate' => 'required',
           'name'          => 'required',
        ]);

        $user = $request->user();

        $user ->update($request->only('name'));

        /*create or update a driver associate with this  user*/
        $user->driver()->updateOrCreate($request->only([
            'year',
            'make',
            'model',
            'color',
            'licence_plate',
        ]));

        $user->load('driver');

        return $user;
    }
}
