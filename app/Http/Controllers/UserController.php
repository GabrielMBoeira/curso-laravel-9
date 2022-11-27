<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::where('name', 'LIKE', "%{$request->search}%")->get();

        $search = $request->search;
        $users = User::where(function($query) use ($search){

            if($search) {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "{$search}");
            }

        })->get();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // $user = User::where('id', $id)->first(); //Recuperar um único usuário
        // $user = User::find($id); //Find já recupera o usuário pelo id

        if (!$user = User::find($id)) {
            // return redirect()->back(); //Retorna de onde veio
            return redirect()->route('users.index');
        }

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.index');
        // return redirect()->route('users.show', $user->id);

        // dd($request->all()); //Pega tudo que vem na request

        // dd($request->only([
        //     'name', 'email', 'password' //Pega somente os campos citados no array
        // ]));

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
    }

    public function edit($id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request,  $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->only(['name', 'email']);
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);

        //teste
        return redirect()->route('users.index');
    }

    public function destroy($id) {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();

        return redirect()->route('users.index');

    }
}