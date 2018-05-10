<?php

namespace App\Http\Controllers;

use App\Sermo;
use Illuminate\Http\Request;
use App\Sermon;
use App\User;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function sundaySermons($id = null)
    {
        if ($id == null) {
            $sunday = Sermo::all(array('title', 'album', 'artist', 'genre', 'source', 'image', 'trackNumber',
                'totalTrackCount', 'duration', 'site'));
            //$sunday = \DB::table('sermos')->where('category', '=', 'Sunday')->get();
            //$sunday = Sermo::all();
        } /*else {
            //$sunday = Sermo::find($id, array('title', 'category', 'audio'));
            $sunday = Sermo::all();
        }*/
        return \Response::json(
            array('music'=>$sunday)
        );
    }

    public function mondaySermons($id = null)
    {
        if ($id == null) {
            //$products = Sermon::all(array('id', 'title', 'audio'));
            $monday = \DB::table('sermons')->where('category', '=', 'Monday')->get();
        } else {
            $monday = Sermon::find($id, array('title', 'category', 'audio'));
        }
        return \Response::json(
            array('mondaysermons'=>$monday)
        );
    }

    public function tuesdaySermons($id = null)
    {
        if ($id == null) {
            //$products = Sermon::all(array('id', 'title', 'audio'));
            $tuesday = \DB::table('sermons')->where('category', '=', 'Tuesday')->get();
        } else {
            $tuesday = Sermon::find($id, array('title', 'category', 'audio'));
        }
        return \Response::json(
            array('tuesdaysermons'=>$tuesday)
        );
    }

    public function wednesdaySermons($id = null)
    {
        if ($id == null) {
            //$products = Sermon::all(array('id', 'title', 'audio'));
            $wednesday = \DB::table('sermons')->where('category', '=', 'Wednesday')->get();
        } else {
            $wednesday = Sermon::find($id, array('title', 'category', 'audio'));
        }
        return \Response::json(
            array('wednesdaysermons'=>$wednesday)
        );
    }

    public function thursdaySermons($id = null)
    {
        if ($id == null) {
            //$products = Sermon::all(array('id', 'title', 'audio'));
            $thurday = \DB::table('sermons')->where('category', '=', 'Thursday')->get();
        } else {
            $thurday = Sermon::find($id, array('title', 'category', 'audio'));
        }
        return \Response::json(
            array('thurdaysermons'=>$thurday)
        );
    }

    public function fridaySermons($id = null)
    {
        if ($id == null) {
            //$products = Sermon::all(array('id', 'title', 'audio'));
            $friday = \DB::table('sermons')->where('category', '=', 'Friday')->get();
        } else {
            $friday = Sermon::find($id, array('title', 'category', 'audio'));
        }
        return \Response::json(
            array('fridaysermons'=>$friday)
        );
    }

    public function saturdaySermons($id = null)
    {
        if ($id == null) {
            //$products = Sermon::all(array('id', 'title', 'audio'));
            $saturday = \DB::table('sermons')->where('category', '=', 'Saturday')->get();
        } else {
            $saturday = Sermon::find($id, array('title', 'category', 'audio'));
        }
        return \Response::json(
            array('fridaysermons'=>$saturday)
        );
    }

    public function login($id = null)
    {
        if ($id == null) {
            $products = User::all(array('email', 'id'));
        } else {
            $products = User::find($id, array('email', 'id'));
        }
        return \Response::json(
            $products
        );
    }
}
