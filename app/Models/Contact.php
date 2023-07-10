<?php

namespace App\Models;

use App\Scopes\SearchContactScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterDataScope;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'address', 'phone', 'company_id'];
    use HasFactory;
    public function company(){
        return $this->belongsTo(Company::class);
    }

    //scope
    public function scopeLatestFirst($query){
        return $query->orderBy('id', 'desc');
    }

    public static function booted()
    {
        static::addGlobalScope(new FilterDataScope);
        static::addGlobalScope(new SearchContactScope);
    }
}
