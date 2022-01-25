<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\TypeMedicamento;
use App\Models\ViaAdmMedicamento;
use App\Models\Estoque;

class MedicamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:user']);
    }

    public function form(){
        $tipos = TypeMedicamento::all();
        $vias = ViaAdmMedicamento::all();
        return view('forms.register-medicamento', ['tipos' => $tipos, 'vias' => $vias]);
    }

    public function show(){
        $medicamentos = Medicamento::where('user_id', auth()->user()->id)->paginate(10);
        $tipos = TypeMedicamento::all();
        $vias = ViaAdmMedicamento::all();

        $tipos_med = array();
        $vias_med = array();

        foreach ($medicamentos as $medicamento) { 
            foreach ($tipos as $tipo){
                if($medicamento->tipo_med == $tipo->id){
                    $tipos_med[$medicamento->tipo_med] = $tipo->tipo; 
                }
            }
            foreach ($vias as $via){
                if($medicamento->via_med == $via->id){
                    $vias_med[$medicamento->via_med] = $via->via_adm; 
                }
            }
        }

        return view('pages.list-medicamentos', [
            'medicamentos' => $medicamentos, 
            'tipos_med' => $tipos_med, 
            'vias_med' => $vias_med
        ]);
    }

    public function create(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tipo_med' => ['required'],
            'via_med' => ['required'],
        ]);

        $medicamento = Medicamento::create([
            'name' => $request->name,
            'description' => $request->description,
            'tipo_med' => $request->tipo_med,
            'via_med' => $request->via_med,
            'user_id' => auth()->user()->id,
        ]);

        $medicamento->save();

        return redirect()->route('list-meds')->with('mes', 'Medicamento cadastrado com sucesso!');
    }

    public function edit(Request $request){
        $medicamento = Medicamento::findOrFail($request->id);
        $tipos = TypeMedicamento::all();
        $vias = ViaAdmMedicamento::all();

        return view('forms.edit-medicamento', [
            'medicamento' => $medicamento,
            'tipos' => $tipos, 
            'vias' => $vias
        ]);
    }

    public function update(Request $request){
        $idoso = Medicamento::find($request->id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tipo_med' => ['required'],
            'via_med' => ['required'],
        ]);
        
        $idoso->name = $request->name;
        $idoso->description = $request->description;
        $idoso->tipo_med = $request->tipo_med;
        $idoso->via_med = $request->via_med;
        $idoso->user_id = auth()->user()->id;

        $idoso->update();

        return redirect()->route('list-meds')->with('mes', 'Medicamento editado com sucesso!');
    }

    public function destroy(Request $request){
        if(Estoque::where('med_id', $request->id)->exists()){
            return redirect()->route('list-meds')->with('erro', 'Não é possível deletar o Medicamento! Ele possui estoque cadastrado.');
        }
        $medicamento = Medicamento::find($request->id);
        $medicamento->delete();
        return redirect()->route('list-meds')->with('mes', 'Medicamento deletado com sucesso!');
    }

}
