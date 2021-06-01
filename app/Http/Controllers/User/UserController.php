<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        $user = User::findOrFail(Auth::user()->id);
        $userId = $user['id'];


       $books = Book::join("downloads", "downloads.book_id", "=", "books.id")->where("downloads.user_id", "=", "$userId")->select('books.*')->orderBy('title')->distinct()->paginate(6);

        return view('user.profileUser', compact('user', 'books'));
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
        return view('user.formEditUser', compact('user'));
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
        User::findOrFail($request->get('id'))->update($request->all());
        Log::info("Datos editados por el usuario con id:". $request->get('id'));
        return redirect()->route('user.showProfile')->with('success','Usuario  modificado con éxito');
    } catch (Exception $e) {
        return redirect()->route('user.showProfile')->with('danger','El usuario no se ha podido modificar');
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
            Log::info("Usuario con id: $id ha eliminado su cuenta");
            return redirect('/')->with('success','Tu cuenta se ha eliminado, esperamos volver a verte pronto');
        }catch (Exception $e) {
            return redirect()->route('user.showProfile')->with('danger','El usuario no se ha podido borrar');
        }

    }
}
