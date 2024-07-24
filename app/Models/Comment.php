<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'article_id',
    ];

    // Un comment est fait sur un seul article
    public function article() {
        return $this->belongsTo(Article::class);
    }

    // Un commentaire appartient à un seul user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
