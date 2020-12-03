<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('city', 'CityCrudController');
    Route::crud('township', 'TownshipCrudController');
    Route::crud('channel', 'ChannelCrudController');
    Route::crud('openingday', 'OpeningdayCrudController');
    Route::crud('delivery', 'DeliveryCrudController');
    Route::crud('pricing', 'PricingCrudController');
    Route::crud('delivery_review', 'Delivery_reviewCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('post', 'PostCrudController');
    Route::crud('category_post', 'Category_PostCrudController');
    Route::get('dashboard','DashboardController@index');
    Route::crud('comment', 'CommentCrudController');
    Route::crud('topic', 'TopicCrudController');
    Route::crud('forum_category', 'Forum_categoryCrudController');
    Route::crud('forum_discussion', 'Forum_discussionCrudController');
    Route::crud('forum_category_topic', 'Forum_category_topicCrudController');
    Route::crud('playlist', 'PlaylistCrudController');
    Route::crud('videos', 'VideosCrudController');
    Route::crud('video', 'VideoCrudController');
    Route::crud('showplaylist', 'ShowplaylistCrudController');
    Route::crud('eventcategory', 'EventcategoryCrudController');
    Route::crud('organizer', 'OrganizerCrudController');
    Route::crud('venue', 'VenueCrudController');
    Route::crud('speaker', 'SpeakerCrudController');
    Route::crud('event', 'EventCrudController');
}); // this should be the absolute last line of this file