<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'title',
        'author',
        'genre',
        'isbn',
        'description',
        'published',
        'publisher',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    /**
     * Get created
     *
     */
    public function getCreatedAttribute()
    {
        return $this->created_at ? $this->created_at->format('jS M, Y') : '--';
    }

    /**
     * Get modified
     *
     */
    public function getModifiedAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('jS M, Y') : '--';
    }

    /**
     * Get published date for edit
     *
     */
    public function getPublishedEditAttribute()
    {
        return $this->published ? $this->published->format('m/d/Y') : '--';
    }
    /**
     * Get published date
     *
     */
    public function getpublishedDateAttribute()
    {
        return $this->published ? $this->published->format('jS M, Y') : '--';
    }


}
