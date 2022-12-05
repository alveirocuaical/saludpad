<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-document-admin-index');
        return view('admin.users.index',[
            'newUser'=>new User,
            'usuarios'=>User::orderBy('name')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $usuario =  new User);

        return view('admin.users.create',[
            'usuario'=>$usuario
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        
       
        $usuario = User::create( [ 
            'role'=>'user',           
             'name' => request('name'),
             'email'=>request('email'),
             'password' => Hash::make(request('id')),
             'id_usuario' => request('id'),
        ]);
        $this->authorize('create',$usuario);
        $request->validated($usuario);

       
       
       return redirect()->route('admin-users.index')->with('status','El usuario se registro con éxito');
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
    public function edit(User $usuario)
    {
        $this->authorize('update', $usuario); // se usa el metodo update de la politica

        return view('admin.users.edit',[
            'usuario'   => $usuario,
                      
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $usuario, AdminUserRequest $request)
    {
        $this->authorize('update', $usuario);

        $usuario->update(array_filter($request->validated()));

        return redirect()->route('admin-users.index')->with('status','Los datos del usuario se actualizaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario)
    {
        //dd($usuario);
        ///$this->authorize('destroy',$usuario);
        $this->authorize('view-document-admin-index');
        DB::table('users')->where('id',$usuario)->delete();

        return redirect()->route('admin-users.index')->with('status','El usuario fue eliminado correctamente');
    }
}
