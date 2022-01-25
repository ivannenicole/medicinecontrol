<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idoso;
use App\Models\Ministracao;
use Illuminate\Support\Facades\File;

class IdosoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:user']);
    }

    public function form(){
        return view('forms.register-idoso');
    }

    public function create(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_resp' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'data_nasc' => ['required'],
        ]);

        $imageName = '';

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . $extension);
            $requestImage->move(public_path('users/idosos'), $imageName);
        }

        $idoso = Idoso::create([
            'name' => $request->name,
            'name_resp' => $request->name_resp,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'image' => $imageName,
            'data_nasc' => $request->data_nasc,
            'user_id' => auth()->user()->id,
        ]);

        $idoso->save();

        return redirect()->route('list-idosos')->with('mes', 'Idoso cadastrado com sucesso!');
    }

    public function edit(Request $request){
        $idoso = Idoso::findOrFail($request->id);
        return view('forms.edit-idoso', ['idoso' => $idoso]);
    }

    public function update(Request $request){
        $idoso = Idoso::find($request->id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_resp' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'data_nasc' => ['required'],
        ]);

        $imageName = '';

        if($request->hasFile('image')){
            if($idoso->image){
                File::delete(public_path('users/idosos/' . $idoso->image));
            }
            if($request->file('image')->isValid()){
                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . $extension);
                $requestImage->move(public_path('users/idosos'), $imageName);

                $idoso->image = $imageName;
            }
        }

        $idoso->name = $request->name;
        $idoso->name_resp = $request->name_resp;
        $idoso->email = $request->email;
        $idoso->telefone = $request->telefone;
        $idoso->data_nasc = $request->data_nasc;

        $idoso->update();

        return redirect()->route('list-idosos')->with('mes', 'Idoso editado com sucesso!');
    }

    public function show(){
        $idosos = Idoso::where('user_id', auth()->user()->id)->orderBy('name')->paginate(10);
        return view('pages.list-idosos', ['idosos' => $idosos]);
    }

    public function destroy(Request $request){
        if(Ministracao::where('idoso_id', $request->id)->exists()){
            return redirect()->route('list-idosos')->with('erro', 'Não é possível deletar o Idoso! Ele possui ministração cadastrada. Caso queira deletar, exclua as ministrações vinculadas ao idoso antes.');
        }
        $idoso = Idoso::find($request->id);
        if($idoso->image){
            File::delete(public_path('users/idosos/' . $idoso->image));
        }
        $idoso->delete();
        return redirect()->route('list-idosos')->with('mes', 'Idoso deletado com sucesso!');
    }
}
