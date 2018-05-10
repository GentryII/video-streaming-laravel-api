<?php

namespace App\Http\Controllers;

use App\SystemUser;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        //$users = User::all();
        $users = \DB::table('users')->paginate(5);
        return view('back-end.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this -> validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password2' => 'required'
        ]);

        $password1 = $request->password;
        $password2 = $request->password2;

            $formInput = $request -> except('password');
            $password = bcrypt('password');
            $formInput['password'] = $password;

            User::create($formInput);

        \Session::flash("success_message", "User added successfully");
        return redirect('create-user');
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
        $user = User::findOrFail($id);
        return view('back-end.users.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();


        //$sermon->update($request->all());
        \Session::flash("update_message", "User updated successfully");
        return redirect('create-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->forceDelete();

        \Session::flash("deletion_message", "User Deleted");
        return redirect('create-user');
    }
}
