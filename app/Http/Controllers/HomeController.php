<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Delivery_review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //to retrieve data from db
        $channels = DB::select('select * from channels');
        $cities = DB::select('select * from cities');
        $townships = DB::select('select * from townships');
        $posts = DB::select('select * from posts ORDER BY id DESC LIMIT 6');
        $deliveries = DB::select('select * from deliveries ORDER BY id DESC LIMIT 4');
        $users = DB::select('select * from users');

        return view('home', compact('channels', 'cities', 'townships', 'posts', 'users', 'deliveries'));
    }
    public function searchlist(Request $request)
    {
        //dd($request->all());
        $categoryid = $request->category;
        $cityid = $request->city;
        $townshipid = $request->township;
        if ($categoryid != null || $cityid != null || $townshipid != null) {
            if ($categoryid == null) {
                $deliveries = Delivery::where(function ($query) use ($cityid) {
                    if ($cityid != null) {
                        return $query->where('city_id', $cityid);
                    }
                })->where(function ($query) use ($townshipid) {
                    if ($townshipid != null) {
                        return $query->where('township_id', $townshipid);
                    }
                })->paginate(5);
                $channels = DB::select('select * from channels');
                //dd($channels);
            } else {
                $channel = \App\Models\Channel::find($categoryid);
                //check data is empty or not
                if ($channel->deliveries->isEmpty()) {
                    $channels = [];
                    $deliveries = [];
                } else {
                    foreach ($channel->deliveries as $delivery) {
                        //to get data from pivot table
                        $deliveryID = $delivery->pivot->delivery_id;
                        //echo $deliveryID;
                        //to add data in array
                        $deliveries = Delivery::where(function ($query) use ($cityid) {
                            if ($cityid != null) {
                                return $query->where('city_id', $cityid);
                            }
                        })->where(function ($query) use ($townshipid) {
                            if ($townshipid != null) {
                                return $query->where('township_id', $townshipid);
                            }
                        })->where(function ($query) use ($deliveryID) {
                            return $query->where('id', $deliveryID);
                        })->paginate(5);

                        $channelID = $delivery->pivot->channel_id;
                        $channels = DB::select('select * from channels where id = ?', [$channelID]);
                    }
                }
            }
        } else {
            //$deliveries = DB::select('select * from deliveries');
            $deliveries = \App\Models\Delivery::query()->paginate(5);
            $channels = DB::select('select * from channels');
        }
        //dd(count($deliveries));
        //$allChannels = DB::select('select * from channels');
        $allChannels = \App\Models\Channel::withCount('deliveries')->get();
        $cities = DB::select('select * from cities');
        $townships = DB::select('select * from townships');
        //dd(count($deliveries));
        return view('searchlist', compact('deliveries', 'channels', 'allChannels', 'cities', 'townships', 'categoryid', 'cityid', 'townshipid'));
    }

    public function deliverydetails(Request $request)
    {
        //dd($request->all());
        //to get data in session 
        if (count($request->all()) == 0) {
            $deliveryid = session()->get('deliveryid');
            $categoryid = session()->get('channelid');
        } else {
            //to set data to session
            $categoryid = $request->channelid;
            $deliveryid = $request->deliveryid;
        }
        // to get data by id
        $deliveries = DB::select('select * from deliveries where id = ?', [$deliveryid]);

        $prices = DB::select('select extras from pricings where delivery_id = ?', [$deliveryid]);
        //to check data where null or not 
        if (count($prices) != 0) {
            foreach ($prices as $price) {
                $myprices = json_decode((json_decode($price->extras)->pricing));
            }
        } else {
            $myprices = [];
        }
        //to get data from db
        $cities = DB::select('select * from cities');
        $townships = DB::select('select * from townships');
        $channels = DB::select('select * from channels');
        $userid = Auth::id();
        //$reviews = DB::select('select * from delivery_reviews where delivery_id = ?', [$deliveryid]);
        $reviews = \App\Models\Delivery_review::query()
            ->where('delivery_id', '=', $deliveryid)
            ->get();

        //to return data
        return view('deliverydetails')->with([
            'deliveries' => $deliveries,
            'myprices' => $myprices,
            'cities' => $cities,
            'townships' => $townships,
            'channels' => $channels,
            'userid' => $userid,
            'categoryid' => $categoryid,
            'reviews' => $reviews,
        ]);
    }

    public function store(Request $request)
    {
        //to store data in db
        $review = new Delivery_review();
        $review->delivery_id = $request->deliveryid;
        $review->review_text = $request->review;
        $review->rating_star = $request->star;
        $review->user_id = $request->userid;

        $review->save();
        //to get data by id
        $stars = DB::select('select rating_star from delivery_reviews where delivery_id = ?', [$request->deliveryid]);
        $sumStar = 0;
        foreach ($stars as $star) {
            //sum rating stars
            $sumStar += $star->rating_star;
        }
        //to get average rating
        $rating = $sumStar / count($stars);
        $starRating = (int)$rating;
        //to update rating in delivery db
        $updateDelivery = DB::table('deliveries')
            ->where('id', $request->deliveryid)
            ->update(['rating' => $starRating]);

        //to redirect view
        $categoryid = $request->channelid;
        $deliveries = DB::select('select * from deliveries where id = ?', [$request->deliveryid]);
        $prices = DB::select('select extras from pricings where delivery_id = ?', [$request->deliveryid]);
        //check data null or not
        if (count($prices) != 0) {
            foreach ($prices as $price) {
                $myprices = json_decode((json_decode($price->extras)->pricing));
            }
        } else {
            $myprices = [];
        }

        $cities = DB::select('select * from cities');
        $townships = DB::select('select * from townships');
        $channels = DB::select('select * from channels');
        $userid = Auth::id();
        // $reviews = DB::select('select * from delivery_reviews where delivery_id = ?', [$request->deliveryid]);
        // $users = DB::select('select * from users');
        $reviews = \App\Models\Delivery_review::query()
            ->where('delivery_id', '=', $request->deliveryid)
            ->get();
        //redirect to route
        return redirect()->route('deliverydetails')->with([
            'deliveries' => $deliveries,
            'myprices' => $myprices,
            'cities' => $cities,
            'townships' => $townships,
            'channels' => $channels,
            'userid' => $userid,
            'categoryid' => $categoryid,
            'reviews' => $reviews,
        ]);
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
}
