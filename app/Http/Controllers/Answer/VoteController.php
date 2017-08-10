<?php

namespace Pitaj\Http\Controllers\Answer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pitaj\Http\Controllers\Controller;
use Pitaj\Models\Answer;
use Pitaj\Models\Vote;

class VoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Up vote given answer
     *
     * @param Request $request
     * @param Answer $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function vote(Request $request, Answer $answer)
    {
        $action = $request->route('action');
        $allowedActions = ["up", "down"];
        if (array_key_exists($action, $allowedActions)) {
            return back();
        }

        $user = Auth::user();
        $vote = $user->hasVoted($answer);

        //user did not vote already
        if ($vote instanceof Vote) {
            $vote->delete();
        }
        $user->vote($answer, $action);
        return back();
    }
}