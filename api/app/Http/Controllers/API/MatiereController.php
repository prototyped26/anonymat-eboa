<?php

namespace App\Http\Controllers\API;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatiereController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $matieres = Matiere::all();
            $matieresReturn = [];
            foreach ($matieres as $index => $matiere) {
                $matiere['epreuve'] = $matiere->epreuve;
                $matiere['option'] = $matiere->option;
                $matiere['option']['filiere'] = $matiere->option->filiere;
                $matiere['option']['filiere']['cycle'] = $matiere->option->filiere->cycle;
                $matieresReturn[] = $matiere;
            }

            return response()->json($matieresReturn, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'label' => 'required',
            'option_id' => 'required',
            'epreuve_id' => 'required'
        ]);
        try {
            $input = $request->all();


            $matiere = new Matiere($input);
            $matiere->save();

            return response()->json($matiere, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'label' => 'required',
            'option_id' => 'required',
            'epreuve_id' => 'required'
        ]);
        try {
            $input = $request->all(['id', 'label', 'desc', 'option_id', 'epreuve_id']);


            Option::where('id', '=', $input['id'])->update($input);
            $matiere = Matiere::find($input['id']);

            return response()->json($matiere, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $matiere = Matiere::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $matiere = Matiere::find($id);
            $matiere['option'] = $matiere->option;
            $matiere['option']['filiere'] = $matiere->option->filiere;
            $matiere['option']['filiere']['cycle'] = $matiere->option->filiere->cycle;

            return response()->json($matiere, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
