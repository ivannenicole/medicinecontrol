<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idoso;
use App\Models\Medicamento;
use App\Models\Ministracao;
use App\Models\Estoque;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function listUsers(){
        $users = User::whereRoleIs('user')->paginate(10);
        return view('admin.list-users', ['users' => $users]);
    }

    public function editUser(Request $request){
        $user = User::find($request->id);
        return view('admin.edit-user', ['user' => $user]);
    }

    public function updateUser(Request $request){
        $user = User::findOrFail($request->id);

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
            //$user->sendEmailVerificationNotification();
        }

        return redirect()->route('list-users')->with('mes', 'Usuário editado com sucesso!');
    }

    public function deleteUser(Request $request){
        //Lembrar de enviar uma notificação quando o usuário for deletado
        $user = User::find($request->id);
        Ministracao::where('user_id', $user->id)->delete();
        Estoque::where('user_id', $user->id)->delete();
        Idoso::where('user_id', $user->id)->delete();
        Medicamento::where('user_id', $user->id)->delete();
        if($user->image){
            File::delete(public_path('users/profile/' . $user->image));
        }
        $user->delete();
        return redirect()->route('list-users')->with('mes', 'User deletado com sucesso!');
    }
}
