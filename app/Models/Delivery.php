<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Str;

class Delivery extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'deliveries';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];
    //protected $casts = [];
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('public_folder')->delete($obj->image);
        });
    }
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }
    public function township()
    {
        return $this->belongsTo(\App\Models\Township::class);
    }
    public function reviews(){
        return $this->belongsToMany(\App\Models\Delivery_review::class);
    }
    public function openingdays()
    {
        return $this->belongsToMany(\App\Models\Openingday::class);
    }
    public function channels()
    {
        return $this->belongsToMany(\App\Models\Channel::class);
    }


    
public function setImageAttribute($value)
{
    $attribute_name = "image";
     $disk = config('backpack.base.root_disk_name');
    $destination_path = "public/uploads/featureImages";

    // if the image was erased
    if ($value==null) {
        // delete the image from disk
        \Storage::disk($disk)->delete($this->{$attribute_name});

        // set null in the database column
        $this->attributes[$attribute_name] = null;
    }

    // if a base64 was sent, store it in the db
    if (Str::startsWith($value, 'data:image'))
    {
        // 0. Make the image
        $image = \Image::make($value)->encode('jpg', 90);
        // 1. Generate a filename.
        $filename = md5($value.time()).'.jpg';
        // 2. Store the image on disk.
        \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
        // 3. Save the path to the database
        $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
        $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;    }
}
   
public function setLogoAttribute($value)
{
    $attribute_name = "logo";
     $disk = config('backpack.base.root_disk_name');
    $destination_path = "public/uploads/logoimages";

    // if the image was erased
    if ($value==null) {
        // delete the image from disk
        \Storage::disk($disk)->delete($this->{$attribute_name});

        // set null in the database column
        $this->attributes[$attribute_name] = null;
    }

    // if a base64 was sent, store it in the db
    if (Str::startsWith($value, 'data:image'))
    {
        // 0. Make the image
        $image = \Image::make($value)->encode('jpg', 90);
        // 1. Generate a filename.
        $filename = md5($value.time()).'.jpg';
        // 2. Store the image on disk.
        \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
        // 3. Save the path to the database
        $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
        $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;    }
}
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
