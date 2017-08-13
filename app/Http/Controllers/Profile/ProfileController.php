<?php
namespace Pitaj\Http\Controllers\Profile;

use Pitaj\Http\Controllers\Controller;
use Pitaj\Models\User;
use Pitaj\Presenters\UserProfilePresenter;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::with(['questions', 'answers'])->findOrFail($id);

        $profile = new UserProfilePresenter($user);

        return view('profile.index', compact('profile'));
    }
}