<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Forum_category;
use App\Models\Forum_discussion;
use App\Models\Topic;
use App\Models\Forum_category_topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    public function forum()
    {
        $forumCategories = Forum_category::withCount('topics')->get();

        $userid = Auth::id();
        return view('Forum.forum', compact('forumCategories', 'userid'));
    }
    public function forumtopic(Request $request)
    {
        //dd($request->session()->get('categoryid'));
        if ($request->page != null) {
            $categoryid = $request->session()->get('categoryid');
        } else {
            $categoryid = $request->categoryid;
        }
        $userid = Auth::id();
        $category = Forum_category::find($categoryid);
        $topics = $category->topics()->paginate(5);
        //dd($topics[0]);

        $categories = Forum_category::all();
        return view('Forum.forumtopic', compact('topics', 'categoryid', 'categories', 'userid'));
    }
    public function singlequestion(Request $request)
    {

        if (count($request->all()) == 0) {
            $topicid = session()->get('topicid');
        } else {
            $topicid = $request->topicid;
        }

        $topics = Topic::find($topicid);
        $discussions = \App\Models\Forum_discussion::query()
            ->where('topic_id', '=', $topicid)
            ->get();
        $userid = Auth::id();
        $categories = Forum_category::all();

        //redirect to route
        return view('Forum.singlequestion')->with([
            'discussions' => $discussions,
            'topics' => $topics,
            'userid' => $userid,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $comment = new Forum_discussion();
        $comment->discussion = $request->comment;
        $comment->topic_id = $request->topicid;
        $comment->user_id = $request->userid;

        $comment->save();
        $userid = Auth::id();

        $discussions = \App\Models\Forum_discussion::query()
            ->where('topic_id', '=', $request->topicid)
            ->get();
        $topics = Topic::find($request->topicid);
        $categories = Forum_category::all();
        //redirect to route
        return redirect()->route('singlequestion')->with([
            'discussions' => $discussions,
            'topics' => $topics,
            'userid' => $userid,
            'categories' => $categories
        ]);
    }

    public function forumquestion(Request $request)
    {
        //dd($request->all());
        $forumtopic = new Topic();
        $forumtopic->name = $request->title;
        $forumtopic->description = $request->question;
        $forumtopic->user_id = $request->userid;

        $forumtopic->save();
        $topics = Topic::query()->orderBy('id', 'desc')->get();
        //dd($topics);
        $categoryid = $request->categoryid;
        if (count($topics) > 0) {
            $topicid = $topics[0]->id;
        } else {
            $topicid = 1;
        }

        $category_topic = DB::insert('insert into forum_category_topic (forum_category_id,topic_id) values (?, ?)', [$categoryid, $topicid]);

        $categoryid = $request->categoryid;

        $category = Forum_category::find($categoryid);
        $topics = Topic::find($topicid);
        $discussions = \App\Models\Forum_discussion::query()
            ->where('topic_id', '=', $topicid)
            ->get();
        $userid = Auth::id();
        $categories = Forum_category::all();

        //redirect to route
        return redirect()->route('singlequestion')->with([
            'discussions' => $discussions,
            'topics' => $topics,
            'userid' => $userid,
            'categories' => $categories
        ]);
    }
}
