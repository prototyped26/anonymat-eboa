<?php

namespace App\Http\Controllers\API;

use App\Models\Anonymat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnonymatController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $anonymats = Anonymat::all();
            $anonymatsReturn = [];
            foreach ($anonymats as $index => $anonymat) {
                $anonymat['eleve'] = $anonymat->eleve;
                $anonymat['epreuve'] = $anonymat->epreuve;
                $anonymatsReturn[] = $anonymat;
            }

            return response()->json($anonymatsReturn, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function getAnonymats(Request $request, $epreuve) {
        $input = $request->all();
        try {

            $anonymats = Anonymat::whereIn('eleve_id', $input)->where('epreuve_id', '=', $epreuve)->get();
            $anonymatsReturn = [];
            foreach ($anonymats as $index => $anonymat) {
                $anonymat['eleve'] = $anonymat->eleve;
                $anonymat['epreuve'] = $anonymat->epreuve;
                $anonymatsReturn[] = $anonymat;
            }

            return response()->json($anonymatsReturn, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'epreuve_id' => 'required',
            'eleve_id' => 'required',
            'numero' => 'required'
        ]);
        try {
            $input = $request->all(['id', 'numero', 'epreuve_id', 'eleve_id']);


            $anonymat = new Anonymat($input);
            $anonymat->save();

            return response()->json($anonymat, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function save(Request $request) {
        $request->validate([
            'epreuve_id' => 'required',
            'eleve_id' => 'required',
            'numero' => 'required'
        ]);
        try {
            $input = $request->all(['id', 'numero', 'epreuve_id', 'eleve_id']);

            if ($input['id'] != '' && $input['id'] != 'null' && $input['id'] != null) {
                Anonymat::where('id', '=', $input['id'])->update($input);
            $anonymat = Anonymat::find($input['id']);
            } else {
                $anonymat = new Anonymat($input);
                $anonymat->save();
            }


            return response()->json($anonymat, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'epreuve_id' => 'required',
            'eleve_id' => 'required',
            'numero' => 'required'
        ]);
        try {
            $input = $request->all();


            Anonymat::where('id', '=', $input['id'])->update($input);
            $anonymat = Anonymat::find($input['id']);

            return response()->json($anonymat, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $anonymat = Anonymat::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $anonymat = Anonymat::find($id);
            $anonymat['eleve'] = $anonymat->eleve;
            $anonymat['epreuve'] = $anonymat->epreuve;

            return response()->json($anonymat, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
