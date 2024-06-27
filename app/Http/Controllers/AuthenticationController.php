<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function pagelogin(){
        return view('login.index');
    }

    public function login(Request $request){


        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'obrigatório',
            'password.required' => 'obrigatório'
        ]);

        $credentials = ['email' =>$request->email, 'password' => $request->password];

        try {
            //Aqui abaixo vamos colocar a logica para autencação

            if (Auth::attempt($credentials)){
                if (auth()->user()->profiletype == 'employee'){
                    return redirect()->route('dashboard.employee');

                }else if (auth()->user()->profiletype == 'admin'){
                    return redirect()->route('dashboard.admin');
                }

            }else {
                return back()->with('cretentialsMessage', 'Credenciais inválidas!');
            }

        } catch (\Throwable $th) {
           dd($th->GetMessage());
        }
    }
}
