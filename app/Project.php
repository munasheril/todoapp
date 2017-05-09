<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function progress(){
        $completed=$this->tasks->filter( function($t){ 
              return $t->completed;

         })->count();
         $total= $this->tasks->count(); 
         if($total==0)
         {
             return 0;
         }
         
         return $completed/$total*100;
    
}
    protected  $guarded = [];
    public function getRouteKeyName(){
        return 'slug';
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
    