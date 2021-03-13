<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Idea extends Model
{
    protected $fillable = ['title','price', 'summary', 'content','caetgory_id', 'sold_flg'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function latestInterests(){
        return $this->hasMany('App\Interest')->orderBy('created_at', 'desc');
    }

    public function interests(){
        return $this->hasMany('App\Interest');
    }

    public function buyIdeas(){
        return $this->hasMany('App\BuyIdea');
    }

}
