<?php

namespace App\Http\Controllers\API;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    //
    public function list(Request $request) {
        try {

            $notes = Note::all();
            $notesReturn = [];
            foreach ($notes as $index => $note) {
                $note['anonymat'] = $note->anonymat;
                $note['matiere'] = $note->matiere;
                $notesReturn[] = $note;
            }

            return response()->json($notesReturn, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'anonymat_id' => 'required',
            'matiere_id' => 'required',
            'valeur' => 'required'
        ]);
        try {
            $input = $request->all(['anonymat_id', 'matiere_id', 'valeur']);


            $note = new Note($input);
            $note->save();

            return response()->json($note, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'anonymat_id' => 'required',
            'matiere_id' => 'required',
            'valeur' => 'required'
        ]);
        try {
            $input = $request->all();


            Note::where('id', '=', $input['id'])->update($input);
            $note = Note::find($input['id']);

            return response()->json($note, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request, $id) {
        try {

            $note = Note::destroy($id);

            return response()->json('Object Complete Deleted', 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function detail(Request $request, $id) {
        try {

            $note = Note::find($id);
            $note['anonymat'] = $note->anonymat;
            $note['matiere'] = $note->matiere;

            return response()->json($note, 200);

        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
