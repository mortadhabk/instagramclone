<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
class ProfilesController extends Controller
{
    public function index($user)
    {
        $user =  User::findorFail($user);
        $auth = Auth::user();
        $follows = $auth  ? $auth->following->contains($user->id) : false;
        return view('profiles.index', compact('user','follows'));


    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
        ]);
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}");




        /*
        $this->authorize('update',$user->profile);

        $data = request()->validate([
         'title' => 'required',
         'description' => 'required',
         'url' => '',
         'image' => '',


        ]);

         $user->profile->update($data);
         if($file =$request->file('image')){


         }
         $user->profile->image = ;
        return redirect("/profile/{$user->id}");
*/
    }
}
