<?php

namespace App\Http\Controllers\API;

use App\Models\Epreuve;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Eleve;
use App\Models\Like;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    //
    public function upSert(Request $request) {
        $input = $request->all();

        try {

            if ($input['id'] !== null) {
                $content = Matiere::where('id', '=', $input['id'])->update($input);
                $content = Matiere::find($input['id']);
                return response()->json(['success'=> $content], 200);
            } else {
                $content = new Matiere($input);
                $content->save();
                return response()->json(['success'=> $content], 200);
            }

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function getContent(Request $request, $id) {
        $content = [];
        try {

            $cont = new Matiere();
            $cont= Matiere::find($id);

            /*foreach ($cont as $index => $item) {
                $content[$index] = $item;
            }*/

            $works = Matiere::where('author', '=', $id)->get();


            $elt = $cont->elements;
            $likes = $cont->likes;
            $comments = $cont->comments;
            $follows = $cont->follows;
            $cont->user;
            $content = $cont;
            $content["elements"] = $elt;
            $content["works"] = sizeof($works);
            $content["elements_size"] = sizeof($elt) * 1 ;
            $content["like_number"] = sizeof($likes) * 1 ;
            $content["follow_number"] = sizeof($comments) * 1 ;
            $content["comment_number"] = sizeof($follows) * 1;
            return response()->json(['success'=> $content], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function getContents(Request $request) {
        try {

            $contents = Matiere::all();
            return response()->json(['success'=> $contents], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function getMyContents(Request $request, $user) {
        $contents = [];
        try {

            $user = User::find($user);

            $contents = $user->contents;

            return response()->json(['success'=> $contents], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function getCategories(Request $request) {
        try {

            $categories = Epreuve::all();
            return response()->json(['success'=> $categories], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }
    public function likeContent(Request $request) {
        $input = $request->all();

        try {

            if ($input['id'] !== null) {
                $input['status'] = false;
                $like = Like::where('id', '=', $input['id'])->update($input);
                //$like = Matiere::find($input['id']);
                //$like = new Like($input);
                //$like->status = true;
                //$like->id = null;
                // $like->save();
                return response()->json(['success'=> $like], 200);
            } else {
                $like = new Like($input);
                $like->status = true;
                $like->save();
                return response()->json(['success'=> $like], 200);
            }

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }
    public function followCreator(Request $request) {
        $input = $request->all();

        try {

            if ($input['id'] !== null) {
                $input['status'] = false;
                $follow = Eleve::where('id', '=', $input['id'])->update($input);
                //$like = Matiere::find($input['id']);
                /*$follow = new Eleve($input);
                $follow->status = true;
                $follow->id = null;
                $follow->save();*/
                return response()->json(['success'=> $follow], 200);
            } else {
                $follow = new Eleve($input);
                $follow->status = true;
                $follow->save();
                return response()->json(['success'=> $follow], 200);
            }

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }
    public function commentContent(Request $request) {
        $input = $request->all();

        try {

            if ($input['id'] !== null) {
                $comment = Filiere::where('id', '=', $input['id'])->update($input);
                $comment = Filiere::find($input['id']);
                //$comment = new Filiere($input);
                //$comment->save();
                return response()->json(['success'=> $comment], 200);
            } else {
                $comment = new Filiere($input);
                $comment->status = true;
                $comment->save();
                return response()->json(['success'=> $comment], 200);
            }

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function myLikeContents(Request $request, $u) {
        $likes = [];
        try {

            $user = User::find($u);

            $l = Like::where('user', '=', $u)->where('status', '=', 1)->get();

            if ( sizeof($l) > 0) {
                //$l = $l[0];

                foreach ($l as $val) {
                    $inter = [
                        'id' => $val->id,
                        'content' => $val->content,
                        'user' => $val->user,
                        'creator' => null,
                    ];
                    $likes[] = $inter;
                }
            }

            return response()->json(['success'=> $likes], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function myFollowContents(Request $request, $u) {
        $follows = [];
        try {

            $user = User::find($u);

            $l = Eleve::where('follower', '=', $u)->where('status', '=', 1)->get();

            if ( sizeof($l) > 0) {
                // $l = $l[0];

                foreach ($l as $val) {
                    $inter = [
                        'id' => $val->id,
                        'content' => $val->content,
                        'user' => $val->follower,
                        'creator' => null,
                    ];
                    $follows[] = $inter;
                }
            }

            return response()->json(['success'=> $follows], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function addElementToContent(Request $request) {
        $input = $request->all();
        try {

            if ($input['id'] !== null) {
                $element = Note::find($input['id']);
                $element->value = $input['value'];
                $element->save();
                return response()->json(['success'=> $element], 200);
            } else {
                $pos = 1;
                $elements = Note::where('content', '=', $input['content'])->get();

                if (sizeof($elements) > 0) {
                    //$elements = $elements[0];
                    foreach ($elements as $elt) {
                        $pos = $elt->position;
                    }
                    $pos++;
                }

                $element = new Note($input);
                $element->position = $pos;

                $element->save();
                return response()->json(['success'=> $element], 200);
            }


        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function deleteElementToContent(Request $request, $id) {
        try {

            $element = Note::find($id);
            if ($element->type != 'text') {
                Storage::delete('' . $element->value);
            }

            $element->delete();

            return response()->json(['success'=> []], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }

    public function deleteContent(Request $request, $id) {
        try {

            $content = Matiere::find($id);

            $elements = Note::where('content', '=', $content->id)-get();
            foreach ($elements as $element) {
                if ($element->type != 'text') {
                    Storage::delete('' . $element->value);
                }
                $element->delete();
            }

            $content->delete();

            return response()->json(['success'=> []], 200);

        } catch (QueryException $e) {
            return response()->json(['error'=> $e->getMessage()], 400);
        }
    }
}

