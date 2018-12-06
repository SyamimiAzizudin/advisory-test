<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|string',
        ]);

        $users = new User;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->type = $request->type;
        $users->save();

        return redirect()->action('UserController@index')->withMessage('User has been successfully added!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user') );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;
        $user->save();

        return redirect()->action('UserController@index')->withMessage('User has been successfully updated!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->withErrors('User has been successfully deleted!');
    }

    public function userApi($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'token' => $user->token,
        ]);
    }

}
