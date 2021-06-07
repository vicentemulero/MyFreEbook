<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{

    /**
     *Allows access only to the administrator user
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::OrderBy('name')->paginate(10);
        return view('user.usersList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.formAdminEditUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $newPassword = $request->get('newPassword');
            $user = request()->except('_token', 'id');
            if (!empty($newPassword)) {
                $user['password'] = Hash::make($newPassword);
            }
            User::findOrFail($request->get('id'))->update($user);
            Log::info("Datos editados del usuario con id: " . $request->get('id') . " por el administrador");
            return redirect()->route('AdminUser.index')->with('success', 'Usuario editado con éxito');
        } catch (Exception $e) {
            Log::warning("El usuario con id: " . $request->get('id') . " no se ha podido modificar desde el panel de control");
            return redirect()->route('AdminUser.index')->with('danger', 'El usuario no se ha podido modificar');
        }
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
        try {
            $user->delete();
            Log::info("Usuario con id: $id eliminado con éxito");
            return redirect()->route('AdminUser.index')->with('success', 'Usuario eliminado con éxito');
        } catch (Exception $e) {
            Log::error("No se ha podido eliminar al usuario con id: $id");
            return redirect()->route('AdminUser.index')->with('error', 'No se ha podido eliminar el usuario.');
        }
    }
}
