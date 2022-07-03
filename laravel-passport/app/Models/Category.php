<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public function article()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
