<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministracao;
use App\Models\Medicamento;
use App\Models\Idoso;
use App\Models\Estoque;

class MinistracaoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:user']);
    }

    public function form(){
        $medicamentos = Medicamento::all()->where('user_id', auth()->user()->id);
        $idosos = Idoso::all()->where('user_id', auth()->user()->id);
        return view('forms.register-ministracao', [
            'medicamentos' => $medicamentos,
            'idosos' => $idosos
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'med_id' => ['required', 'integer'],
            'idoso_id' => ['required', 'integer'],
            'dosagem' => ['required', 'string'],
            'frequencia' => ['required', 'string'],
            'unidades' => ['required', 'integer'],
        ]);

        $estoque = Estoque::all()->where('med_id', $request->med_id)->first();
        if(Estoque::where('med_id', $request->med_id)->exists()){
            if(($request->unidades > 0 && $request->unidades <= $estoque->unidades_med) && $estoque->unidades_med > 0){
                $ministracao = Ministracao::create([
                    'med_id' => $request->med_id,
                    'idoso_id' => $request->idoso_id,
                    'frequencia' => $request->frequencia,
                    'dosagem' => $request->dosagem,
                    'unidades' => $request->unidades,
                    'user_id' => auth()->user()->id,
                ]);
        
                $ministracao->save();
                
                $estoque->unidades_med -= $request->unidades;
                $estoque->update();
            }else{
                return redirect()->route('form-ministracao')->with('erro', 'Estoque insuficiente!');
            }
        }else{
            return redirect()->route('form-ministracao')->with('erro', 'Medicamento não possui estoque!');
        }

        return redirect()->route('list-ministracao')->with('mes', 'Ministração cadastrada com sucesso!');
    }

    public function show(){
        $ministracoes = Ministracao::where('user_id', auth()->user()->id)->paginate(10);
        $medicamentos = Medicamento::all()->where('user_id', auth()->user()->id);
        $idosos_list = Idoso::all()->where('user_id', auth()->user()->id);

        $meds = array();
        $idosos = array();

        foreach ($ministracoes as $ministracao) { 
            foreach ($medicamentos as $medicamento){
                if($ministracao->med_id == $medicamento->id){
                    $meds[$ministracao->med_id] = $medicamento->name; 
                }
            }
            foreach ($idosos_list as $idoso_list){
                if($ministracao->idoso_id == $idoso_list->id){
                    $idosos[$ministracao->idoso_id] = $idoso_list->name; 
                }
            }
        }

        return view('pages.list-ministracao', [
            'ministracoes' => $ministracoes, 
            'meds' => $meds, 
            'idosos' => $idosos
        ]);
    }

    public function edit(Request $request){
        $ministracao = Ministracao::findOrFail($request->id);
        $medicamentos = Medicamento::all()->where('user_id', auth()->user()->id);
        $idosos = Idoso::all()->where('user_id', auth()->user()->id);

        return view('forms.edit-ministracao', [
            'ministracao' => $ministracao,
            'medicamentos' => $medicamentos,
            'idosos' => $idosos
        ]);
    }

    public function update(Request $request){
        $estoque = Estoque::findOrFail($request->med_id);
        
        $request->validate([
            'med_id' => ['required', 'integer'],
            'idoso_id' => ['required', 'integer'],
            'dosagem' => ['required', 'string'],
            'frequencia' => ['required', 'string'],
            'unidades' => ['required', 'integer'],
        ]);

        if(($request->unidades > 0 && $request->unidades <= $estoque->unidades_med) && $estoque->unidades_med > 0){
            $ministracao = Ministracao::find($request->id);

            if($ministracao->unidades != $request->unidades){
                $estoque->unidades_med += $ministracao->unidades;
                $estoque->unidades_med -= $request->unidades;
                $estoque->update();
            }
            $ministracao->med_id = $request->med_id;
            $ministracao->idoso_id = $request->idoso_id;
            $ministracao->frequencia = $request->frequencia;
            $ministracao->dosagem = $request->dosagem;
            $ministracao->unidades = $request->unidades;
            $ministracao->user_id = auth()->user()->id;

            $ministracao->update();
        }
        

        return redirect()->route('list-ministracao')->with('mes', 'Ministração editado com sucesso!');
    }

    public function destroy(Request $request){
        $ministracao = Ministracao::find($request->id);
        $estoque_ministracao = Estoque::all()->where('med_id', $ministracao->med_id)->first();
        if(Estoque::where('med_id', $request->med_id)->exists()){
            if(($ministracao->unidades > 0 && $ministracao->unidades <= $estoque_ministracao->unidades_med) && $estoque_ministracao->unidades_med > 0){
                if($ministracao->unidades != $request->unidades){
                    $estoque_ministracao->unidades_med += $ministracao->unidades;
                    $estoque_ministracao->update();
                }
            }
        }
        $ministracao->delete();
        return redirect()->route('list-ministracao')->with('mes', 'Ministração deletada com sucesso!');
    }

}
