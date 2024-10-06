<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);  // Obtener todos los clientes paginados
        return view('user.index', compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('user.index');
        //
    }

    /**
     * Activate or deactivate a user.
     *
     * This method toggles the 'active' status of a user based on the provided user ID.
     * If the user is not found, it redirects to the user index route with an error message.
     * Otherwise, it updates the user's 'active' status and redirects to the user index route
     * with a success message.
     *
     * @param string $id The ID of the user to be activated or deactivated.
     * @return \Illuminate\Http\RedirectResponse
     */

    public function activate(String $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->withErrors('User not found.');
        }

        $user->active = !$user->active;
        $user->save();

        return redirect()->route('user.index')->with('status', 'User status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
        //
    }

    // TODO: Implement the find method
    public function find(Request $request)
    {
        print($request);
        $request->validate([
            'dataToFind' => 'required|string',
            'data' => 'required|string',
        ]);

        // Realizar la búsqueda
        if ($request->dataToFind === 'active') {
            $users = User::where('active', $request->data)->get();
        } elseif ($request->dataToFind === 'inactive') {
            $users = User::where('active', '!=', $request->data)->get();
        } else {
            $users = User::where($request->dataToFind, 'like', '%' . $request->data . '%')->get();
        }

        $users = 'SELECT * FROM users WHERE ' . $request->dataToFind . ' LIKE "%' . $request->data . '%"';

        session()->flash('message', 'Búsqueda realizada con éxito');
        // Retornar la vista con los resultados
        return redirect()->route('user.index');
    }
}
