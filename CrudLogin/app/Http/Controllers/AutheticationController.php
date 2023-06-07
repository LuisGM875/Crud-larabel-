<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//Modelo de usario para sesiones de acceder
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
//contaseñas
class AutheticationController extends Controller
{
    public function register(Request $request){
        //Validar datos de usuarios
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        //make estatico
        $user->save(); //guardar en la base de datos
        //Uso de clase Auth para acceder al usario cargado por su id
        Auth::login($user);
        return redirect(route('categorias.index'));
    }

    public function login(Request $request){
        $credentials=[
            "email"=>$request->email,
            "password"=>$request->password,
        ];
        //mantener la sesion con culaquier cambio entre paginas
        $remember=($request->has('remember')?true:false);
        //clase de auth metodo estatico para verificar el intento de sesion
        if(Auth::attempt($credentials,$remember)){
            //preparar sesion
            $request->session()->regenerate();
            //por si estas dentro del crud y entras a otro espacio privado
            return redirect()->intended(route('categorias.index'));
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        //resetear la sesion(se invalida)
        $request->session()->invalidate();
        //regenera la sesion sin cambiar rutas
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
