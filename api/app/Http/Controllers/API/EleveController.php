<?php

namespace App\Http\Controllers\API;

use App\Models\Eleve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EleveController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $eleves = Eleve::all();
            $elevesReturn = [];
            foreach ($eleves as $index => $eleve) {
                $eleve['option'] = $eleve->option;
                $eleve['option']['filiere'] = $eleve->option->filiere;
                $eleve['option']['filiere']['cycle'] = $eleve->option->filiere->cycle;
                $elevesReturn[] = $eleve;
            }

            return response()->json($elevesReturn, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'num_enregistrement' => 'required',
            'option_id' => 'required'
        ]);
        try {
            $input = $request->all();


            $eleve = new Eleve($input);
            $eleve->save();

            return response()->json($eleve, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'num_enregistrement' => 'required',
            'option_id' => 'required'
        ]);
        try {
            $input = $request->all();


            Eleve::where('id', '=', $input['id'])->update($input);
            $eleve = Eleve::find($input['id']);

            return response()->json($eleve, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $eleve = Eleve::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $eleve = Eleve::find($id);
            $eleve['option'] = $eleve->option;
            $eleve['option']['filiere'] = $eleve->option->filiere;
            $eleve['option']['filiere']['cycle'] = $eleve->option->filiere->cycle;

            return response()->json($eleve, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
