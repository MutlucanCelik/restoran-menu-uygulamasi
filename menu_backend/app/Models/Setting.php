<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = ['*'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}