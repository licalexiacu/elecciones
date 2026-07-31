<?php

namespace sgt\Http\Controllers;

use Illuminate\Http\Request;
use sgt\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
	public function index(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $busqueda = $request->busqueda;

        if ($busqueda==''){
            $table = User::join('roles','users.id_rol','=','roles.id')
                ->select('users.id', 'users.usuario', 'users.nombre', 'users.e_mail', 'users.condicion', 'users.id_rol', 'roles.nombre as rol')
            	->orderBy('users.id', 'desc')
            	->paginate(7);    
        } else {
            $table = User::join('roles','users.id_rol','=','roles.id')
                ->select('users.id', 'users.usuario', 'users.nombre', 'users.e_mail', 'users.condicion', 'users.id_rol', 'roles.nombre as rol' )
                ->whereraw('(UPPER(users.usuario) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).') OR UPPER(users.nombre) LIKE UPPER('.chr(39).'%'.$busqueda.'%'.chr(39).'))')
            	->orderBy('users.id', 'desc')
            	->paginate(7);    
        }
        

        return [
            'pagination' => [
                'total'        => $table->total(),
                'current_page' => $table->currentPage(),
                'per_page'     => $table->perPage(),
                'last_page'    => $table->lastPage(),
                'first_item'   => $table->firstItem(),
                'last_item'    => $table->lastItem(),
            ],
            'table' => $table
        ];
    }

    public function store(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $this->save(1, $request);
    }

    public function update(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

      	$this->save(2, $request);
    }

    public function desactivar(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $table = User::findOrFail($request->id);
        $table->condicion = 'false';
        $table->update();
    }

    public function activar(Request $request)
    {
        // Si la peticion es diferente de AJAX redirije todo al raiz
        if (!$request->ajax()) return redirect('/');

        $table = User::findOrFail($request->id);
        $table->condicion = 'true';
        $table->update();
    }

    public function updatePassword(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
    
        // El nombre no es el de la base de datos sino del objeto en la vista
        $user = \Auth::user();
        $rules = [
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('La contraseña actual no es corresta'));
                }
            }]
        ];
    
        $messages = [
            'current_password.required' => 'Se debe ingresar la contraseña actual!!!',
            'password_confirmation.required' => 'Se debe ingresar la nueva contraseña!!!'
        ];
        $this->validate($request, $rules, $messages);
    
        $table = User::findOrFail(\Auth::user()->id); 
    
        $table->password = bcrypt($request->password_confirmation);
        $table->save();
    }

    public function get(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $get = User::where('id', '=', \Auth::user()->id)
            ->select('id', 'nombre', 'id_rol')
            ->get();    

        return [ 'get' => $get ];
    }

    public function select(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $select = User::select('id', 'nombre')
            ->where('id_rol', '=', $request->id_rol)
            ->where('condicion', '=', '1')
            ->orderBy('nombre', 'asc')
            ->get();    

        return [ 'select' => $select ];
    }

    private function save($accion, $request){
        $rules = [
            'usuario'=>'required',
            'nombre'=>'required',
            'id_rol' => 'required|not_in:0',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ];
        
        $messages = [
            'usuario.required'=>'El usuario es obligatorio',
            'id_rol.not_in' => 'El Rol de usuario es obligatorio'
        ];
        $this->validate($request, $rules, $messages);

        if ($accion==1){
            // Insert
            $table = new User;
            $table->condicion = 'true';
            $table->password  = bcrypt($request->password_confirmation);
        } else {
            // Update
            $table = User::findOrFail($request->id);  
        }

        $table->usuario   = $request->usuario;
        $table->nombre   = $request->nombre;
        $table->e_mail   = 'elecciones@gmail.com';
        $table->id_rol     = $request->id_rol;
        $table->save();        
    }
}
