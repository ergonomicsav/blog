<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function allow()
    {
        $this->status = 1;
        $this->save();
    }

    public function noallow()
    {
        $this->status = 0;
        $this->save();
    }

    public function toggleStatus()
    {
        if ($this->status == 0) {
            return $this->allow();
        }
        return $this->noallow();
    }

    public function remove()
    {
        $this->delete();
    }
}
