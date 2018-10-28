<?php

namespace App\Http\Controllers\API;

use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FiliereController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $filieres = Filiere::all();
            $filieresReturn = [];
            foreach ($filieres as $filiere) {
                $filiere['cycle'] = $filiere->cycle;
                $filieresReturn[] = $filiere;
            }

            return response()->json($filieresReturn, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'label' => 'required',
            'cycle_id' => 'required'
        ]);
        try {
            $input = $request->all();


            $filiere = new Filiere($input);
            $filiere->save();

            return response()->json($filiere, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'label' => 'required',
            'cycle_id' => 'required'
        ]);
        try {
            $input = $request->all(['id', 'label', 'desc', 'cycle_id']);


            Filiere::where('id', '=', $input['id'])->update($input);
            $Filiere = Filiere::find($input['id']);

            return response()->json($Filiere, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $Filiere = Filiere::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $Filiere = Filiere::find($id);
            $Filiere['cycle'] = $Filiere->cycle;

            return response()->json($Filiere, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
