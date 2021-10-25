<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        return view('Back.users');
    }
    public function delete($id)
    {
        $review = Review::where('user', $id)->get();
        $count = count($review);
        if ($count > 0) {
            toastr()->error(__('keywords.not-empty-review'));
            return back();
        } else {
            User::findOrFail($id)->delete();
            toastr()->success(__('keywords.event-success'));
        }
        return redirect()->route('Back.list.user');
    }
    public function detail($id)
    {
        $user = User::findOrFail($id);
        return view('Back.detail.user', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->isAdmin = $request->isAdmin;
        $user->save();
        toastr()->success(__('keywords.event-success'));
        return back();
    }
}
