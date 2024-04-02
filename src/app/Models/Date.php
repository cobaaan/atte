<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'work_start', 'work_end', 'content'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
