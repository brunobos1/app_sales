<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Production;
use App\Http\Requests\StoreProductionRequest;
use App\Http\Requests\UpdateProductionRequest;

class ProductionController extends Controller
{

    public function __construct(Production $production)
    {
        $this->production = $production;
    }

    public function index()
    {
        {
            $response = Http::get('https://www.mcoutinhopecas.pt/js/zlf9YiTUSc.js');

            $search = strpos($response, "sales:");

            $rest = substr($response, $search);

            $rest = explode("}},computed:",$rest);

            $rest = str_replace('sales:','',$rest[0]);
            $rest = str_replace('{','{"',$rest);
            $rest = str_replace('}','"}',$rest);
            $rest = str_replace(':','":"',$rest);
            $rest = str_replace(',','","',$rest);

            $data = json_decode($rest, true);
            asort($data);

            $response = array();

            $productions = $this->production->all();

            foreach ($data as $year => $value) {
                $json = '{"year": "'.$year.'","value": "'.(float)$value.'"}';
                $json = json_decode($json, true);
                array_push($response, $json);
            }

            foreach ($productions as $p) {
                $json = '{"year": "'.$p->year.'","value": "'.$p->value.'"}';
                $json = json_decode($json, true);
                array_push($response, $json);
            }

            return response()->json($response, 200);
        }
    }

    public function store(Request $request)
    {
        $request->validate($this->production->rules(), $this->production->feedback());

        $production = $this->production->create($request->all());
        return response()->json($production, 201);
    }

    public function show($year)
    {
        $production = $this->production->where('year', $year)->first();

        if ($production === null){
            return response()->json(['erro' => 'Não existe produção cadastrada para o ano solicitado.'], 404);
        }

        return response()->json($production, 200);
    }

    public function update(Request $request, $year)
    {
        $production = $this->production->where('year', $year)->first();

        if($production === null){
            return response()->json(['erro' => 'Impossível realizar a atualização, o ano solicitado não possui produção cadastrada.'], 404);
        }

        $request->validate($production->rules(), $production->feedback());
        $production->update($request->all());
        return response()->json($production, 200);
    }

    public function destroy($year)
    {
        $production = $this->production->where('year', $year)->first();

        if($production === null){
            return response()->json(['erro' => 'Impossível remover o recurso, pois o ano solicitado não possui produção cadastrada.'], 404);
        }

        $production->delete();
        return response()->json(['msg' => 'A produção do ano solicitado foi removida com sucesso!'], 200);
    }
}
