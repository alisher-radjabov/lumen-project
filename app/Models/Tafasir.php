<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tafasir extends Model
{

    protected $table = "tafasir";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'id','name','created_at','updated_at'
    ];

    /**
     * @var array
     */
    protected $appends = ['key'];

    /**
     * @return string
     */
    public function getKeyAttribute() {
        return (string) @$this->name;
    }
}
