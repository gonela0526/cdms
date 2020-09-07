<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //Table Name
    protected $table = 'blogs';
    //Primary  Key
    protected $primaryKey = 'id';
    //TimeStamps
    public $timestamps = true; 

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
