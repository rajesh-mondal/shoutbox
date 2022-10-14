<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function shoutHome(){
        // return view("shouthome");
        $userId = Auth::id();
        $status = Status::where('user_id', $userId)->orderBy('id','desc')->get();
        return view("shouthome", ['status'=>$status]);
    }

    public function saveStatus(Request $request){
        if(Auth::check()){
            $status = $request->post('status');
            $userId = Auth::id();

            $statusModel = new Status();
            $statusModel->status = $status;
            $statusModel->user_id = $userId;
            $statusModel->save();
            return redirect()->route('shout');
        }
    }

    function saveProfile(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $user->name = $request->post('name');
            $user->email = $request->post('email');
            $user->nickname = $request->post('nickname');
            $user->save();
            return redirect()->route('shout.profile');
        }
    }

    public function profile(){
        return view('profile');
    }
}
