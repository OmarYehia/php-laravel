<?php

namespace App\Models;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function human_readable_date()
    {
        return Carbon::parse($this->created_at)->format(" l jS F Y g:i a");
    }

    public function date_without_time()
    {
        return Carbon::parse($this->created_at)->format("Y-m-d");
    }

    public function comment()
    {
        return $this->morphMany(Comment::class, 'comment');
    }
}
