<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name', 'address', 'email', 'website'];
    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    public function scopeLoadingOption($query){
        return $query->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
    }
}
