<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\Medicamento;
use App\Models\Ministracao;
use App\Models\User;
use App\Models\TypeMedicamento;
use App\Models\ViaAdmMedicamento;

class EstoqueController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:user']);
    }

    public function form(){
        $medicamentos = Medicamento::all()->where('user_id', auth()->user()->id);
        return view('forms.register-estoque', ['medicamentos' => $medicamentos]);
    }

    public function create(Request $request){

        $request->validate([
            'med_id' => ['required', 'integer'],
            'unidades_med' => ['required', 'integer'],
            'peso_unidade' => ['required', 'integer'],
            'valor_unidade' => ['required', 'integer'],
        ]);

        $estoque_med = Estoque::create([
            'med_id' => $request->med_id,
            'unidades_med' => $request->unidades_med,
            'peso_unidade' => $request->peso_unidade,
            'valor_unidade' => $request->valor_unidade,
            'user_id' => auth()->user()->id,
        ]);

        $estoque_med->save();

        return redirect()->route('list-estoque')->with('mes', 'Estoque de Medicamento cadastrado com sucesso!');
    }

    public function show(){
        $estoques_med = Estoque::where('user_id', auth()->user()->id)->paginate(10);
        $medicamentos = Medicamento::all()->where('user_id', auth()->user()->id);

        $meds = array();

        foreach ($estoques_med as $estoque_med) { 
            foreach ($medicamentos as $medicamento){
                if($estoque_med->med_id == $medicamento->id){
                    $meds[$estoque_med->med_id] = $medicamento->name; 
                }
            }
        }

        return view('pages.list-estoque', [
            'estoques_med' => $estoques_med, 
            'meds' => $meds
        ]);
    }

    public function edit(Request $request){
        $estoque_med = Estoque::findOrFail($request->id);
        $medicamentos = Medicamento::all()->where('user_id', auth()->user()->id);

        return view('forms.edit-estoque', [
            'estoque_med' => $estoque_med,
            'medicamentos' => $medicamentos
        ]);
    }

    public function update(Request $request){
        $estoque_med = Estoque::find($request->id);

        $request->validate([
            'med_id' => ['required', 'integer'],
            'unidades_med' => ['required', 'integer'],
            'peso_unidade' => ['required', 'integer'],
            'valor_unidade' => ['required', 'integer'],
        ]);

        $estoque_med->med_id = $request->med_id;
        $estoque_med->unidades_med = $request->unidades_med;
        $estoque_med->peso_unidade = $request->peso_unidade;
        $estoque_med->valor_unidade = $request->valor_unidade;
        $estoque_med->user_id = auth()->user()->id;

        $estoque_med->update();

        return redirect()->route('list-estoque')->with('mes', 'Estoque de Medicamento editado com sucesso!');
    }

    public function destroy(Request $request){
        $estoque_med = Estoque::find($request->id);
        
        if(Ministracao::where('med_id', $estoque_med->med_id)->exists()){
            Ministracao::where('med_id', $estoque_med->med_id)->delete();
        }
        $estoque_med->delete();
        return redirect()->route('list-estoque')->with('mes', 'Estoque de Medicamento deletado com sucesso!');
    }

}
