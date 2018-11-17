<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsList extends Model
{
    protected $fillable = [
        'id_user', 'title', 'description', 'views', 'slug'
    ];

    /**
     * método da relação
     *
     * @return void
    */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
