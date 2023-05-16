<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = User::all();
        return view('akun.index', compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = User::all();
        return view('Akun.create', compact('view'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);

        return redirect('akun');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view = User::find($id);
        return view('akun.edit', compact('view'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:5|max:255'
        // ]);

        // $user->user_id = auth()->id();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;

        // $user->save();
        // return redirect()->route('akun.index');


        $edit = User::find($user);
        $edit->name = $request->name;
        $edit->email = $request->email;
        $edit->password = Hash::make($request->password);
        $edit->save();
        return redirect('akun');

        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:5|max:255,' . $id->id
        // ]);

        // $id->name = $request->name;
        // $id->email = $request->email;
        // $id->password = $request->password;
        // $id->save();
        // return redirect('akun');

        // $edit = $request->validate([
        //     'name' => 'required|max:255',
        //     'password' => 'required|min:5|max:255'
        // ]);

        // if($request->email != $id->email) {
        //     $edit['email'] = 'required|email:dns|unique:users';
        // }

        // $validateData = $request->validate($edit);
        // $edit['password'] = Hash::make($edit['password']);
        // User::where('id', $id->id)->update($validateData);

        // return redirect('akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = User::find($id);
        $hapus->delete();
        return redirect('akun');
    }
}
