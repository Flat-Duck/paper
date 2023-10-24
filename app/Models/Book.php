<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'author',
        'published_at',
        'publisher',
        'file',
        'downloads',
        'section_id',
        'department_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
