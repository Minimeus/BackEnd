<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    /*     public function list()
    {
        $veiculo = Veiculo::factory()->make();
        dd($veiculo->toArray()); 
        } */

        //mudança de list para index. Laravel recomenda index invez de list, por cause das linguas utilizadas. 
        public function index()
        {
            $veiculos = Veiculo::all();
            return view('veiculos.index', compact('veiculos'));
        }

        //criar um veiculo
        public function create(){return view('veiculos.create');}


        //Reutilisando estudante
        public function store(Request $request)
        {
            $request->validate([
                'marca' => 'required',
                'modelo' => 'required|min:4',
                'matricula' => 'required|unique:veiculos|max:6',
                'foi_comprado' => 'boolean',
                'tipo_combustivel' => 'required|string|max:20',
                //fazer de cor uma picklist (lembrete criar)
                'cor' => 'required|string|max:20',
                'ano' => 'nullable|integer',
                //com laravel é nullable e nao opcional
                'vezes_considerada_compra' => 'nullable|integer',
            ]);
    
            $marcaToInsert = $request['marca'];
            $modeloToInsert = $request['modelo'];
            $matriculaToInsert = $request['matricula'];
            $foiCompradoToInsert = $request['foi_comprado'] ?? false;
            $tipoCombustivelToInsert = $request['tipo_combustivel'];
            $corToInsert = $request['cor'];
            //não é lastYear é subYear
            $anoToInsert = $request['ano'] ?? now()->subYear()->year; //ano do carro, se nao meterem por default sera do ano passado ? acho que é assim que funcionam.
            $anoToInsert = $request['ano'];
            //ver se posso meter 0 por default visto que foi acabado de ser adicionado
            $vezes_considerada_compraToInsert = $request['vezes_considerada_compra']?? 0 ;

            // Student::create($request->all());
            Veiculo::create([
                'marca' => $marcaToInsert,
                'modelo' => $modeloToInsert,
                'matricula' => $matriculaToInsert,
                'foi_comprado' => $foiCompradoToInsert,
                'tipo_combustivel' => $tipoCombustivelToInsert,
                'cor' => $corToInsert,
                'ano' => $anoToInsert,
                'vezes_considerada_compra' => $vezes_considerada_compraToInsert,
            ]);
    

            return redirect()->route('veiculos.index')->with('success', 'Parabens pelo o novo veiculo!');
         }

         //ja que criei seeders e factories, preferia tambem utilisar ou ao menos propor para o projeto 
         public function seed()
         {
             Veiculo::factory()->count(10)->create();
             return redirect()->route('veiculos.index')->with('success', '10 veículos criados com sucesso!');
         }



         public function detalhe($id)
         {        
             return view('veiculos.detalhe', compact('veiculo', 'empregados'));
         }


        public function edit(Veiculo $veiculo)
        {
            return view('veiculos.edit', compact('veiculo'));
        }
        public function update(Request $request, Veiculo $veiculo)
        {
            $request->validate([
                'marca' => 'required',
                'modelo' => 'required',

                //ele procura tabem este update
                'matricula' => 'required|unique:veiculos,matricula,' . $veiculo->id . '|max:6',
                'foi_comprado' => 'boolean',
                'tipo_combustivel' => 'required|string|max:20',
                'cor' => 'required|string|max:20',
                'ano' => 'nullable|integer',
                'vezes_considerada_compra' => 'nullable|integer',
            ]);
            $veiculo->update($request->all());
            return redirect()->route('veiculos.index')->with('success', 'Veiculo atualizado');
        }


        public function destroy(Veiculo $veiculo)
        {
            $veiculo->delete();
            return redirect()->route('veiculos.index')->with('success', 'Veiculo apagado da sua conta');
        }

}
