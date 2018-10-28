<?php

namespace App\Http\Controllers\API;

use App\Models\Cycle;
use DemeterChain\C;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CycleController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $cycles = Cycle::all();

            return response()->json($cycles, 200);

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


            $cycle = new Cycle($input);
            $cycle->save();

            return response()->json($cycle, 200);

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


            Cycle::where('id', '=', $input['id'])->update($input);
            $cycle = Cycle::find($input['id']);

            return response()->json($cycle, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $cycle = Cycle::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $cycle = Cycle::find($id);

            return response()->json($cycle, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
