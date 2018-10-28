<?php

namespace App\Http\Controllers\API;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $options = Option::all();
            $optionsReturn = [];
            foreach ($options as $index => $option) {
                $option['filiere'] = $option->filiere;
                $option['cycle'] = $option->filiere->cycle;
                $optionsReturn[] = $option;
            }

            return response()->json($optionsReturn, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'label' => 'required',
            'filiere_id' => 'required'
        ]);
        try {
            $input = $request->all();


            $option = new Option($input);
            $option->save();

            return response()->json($option, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'label' => 'required',
            'filiere_id' => 'required'
        ]);
        try {
            $input = $request->all(['id', 'label', 'desc', 'filiere_id']);


            Option::where('id', '=', $input['id'])->update($input);
            $option = Option::find($input['id']);

            return response()->json($option, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $option = Option::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $option = Option::find($id);
            $option['filiere'] = $option->filiere;

            return response()->json($option, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
