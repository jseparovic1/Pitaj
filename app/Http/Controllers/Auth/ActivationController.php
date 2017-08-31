<?php

namespace Pitaj\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Pitaj\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActivationController extends Controller
{
    /**
     * Activate user after they click confirm in email
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activate(Request $request)
    {
        $token = $request->get('q');
        $userId = $request->get('u');

        $user = User::findOrFail($userId);

        if (! $user->activation()->first()->token === $token) {
           throw new NotFoundHttpException("Activation code not found");
        }

        $user->activate();
        $request->session()->flash('activated', '');

        return view('auth.login');
    }
}
