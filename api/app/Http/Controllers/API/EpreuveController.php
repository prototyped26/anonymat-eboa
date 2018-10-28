<?php

namespace App\Http\Controllers\API;

use App\Models\Epreuve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpreuveController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $epreuves = Epreuve::all();

            return response()->json($epreuves, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'label' => 'required',
        ]);
        try {
            $input = $request->all();


            $epreuve = new Epreuve($input);
            $epreuve->save();

            return response()->json($epreuve, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'label' => 'required',
        ]);
        try {
            $input = $request->all(['id', 'label', 'desc']);


            Epreuve::where('id', '=', $input['id'])->update($input);
            $epreuve = Epreuve::find($input['id']);

            return response()->json($epreuve, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $epreuve = Epreuve::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $epreuve = Epreuve::find($id);

            return response()->json($epreuve, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
