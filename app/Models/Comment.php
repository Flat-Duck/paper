<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','book_id','text'];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
