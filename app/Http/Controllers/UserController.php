<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estoque;
use App\Models\Medicamento;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function dashboard(){
        $estoques_med = Estoque::all()->where('user_id', auth()->user()->id);
        $medicamentos = Medicamento::all()->where('user_id', auth()->user()->id);

        $estoque = 0;
        $valor_total = 0;
        $meds_empty = 0;

        foreach($estoques_med as $estoque_med){
            $valor_total += $estoque_med->valor_unidade*$estoque_med->unidades_med;
            $estoque += $estoque_med->unidades_med;
            foreach($medicamentos as $medicamento){
                if(!Estoque::where('med_id', $medicamento->id)->exists()){
                    $meds_empty++;
                }
            }
        }

        return view('pages.dashboard', [
            'estoque' => $estoque,
            'valor_total' => $valor_total,
            'meds_empty' => $meds_empty
        ]);
    }

    public function perfil(){
        return view('pages.perfil');
    }

    public function update(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'description' => ['string'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        $imageName = '';

        if($request->hasFile('image')){
            if($user->image){
                File::delete(public_path('users/profile/' . $user->image));
            }
            if($request->file('image')->isValid()){
                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . $extension);
                $requestImage->move(public_path('users/profile'), $imageName);

                $user->image = $imageName;
            }
        }

        $user->update();
        
        if(!($request->email == $user->email)){
            $user->sendEmailVerificationNotification();
        }

        return redirect('perfil')->with('mes', 'Usuário editado com sucesso!');
    }

}
