<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\City;
use App\Models\Township;
use App\Models\Channel;
use App\Models\Post;
class DashboardController extends Controller
{
    public function index(){
        $today = date("Y-m-d");
        $users = User::all()->count();;
        $cities = City::all()->count();;
        $townships = Township::all()->count();
        $posts = Post::all()->count();
        $channels = Channel::all()->count();
        //return view(backpack_view('dashboard'),compact('users','cities','townships','channels','posts'));
        if(backpack_user()->hasRole('Admin')){
            return view(backpack_view('dashboard'),compact('users','cities','townships','channels','posts'));
        }elseif(backpack_user()->hasRole('Delivery')){
            return redirect('admin/delivery');
        }else{
            return redirect('/home');
        }
    }
}
