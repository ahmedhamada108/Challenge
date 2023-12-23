<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['id','uuid', 'amount', 'description', 'user_id', 'created_at'];
    public function scopeById($query, $id)
    {
        return $query->with('user')->findOrFail($id);
    }

    public function scopeByUUID($query, $uuid)
    {
        return $query->with('user')->where('uuid', $uuid)->firstOrFail();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
