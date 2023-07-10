<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class FilterDataScope implements Scope
{
    protected $searchColumn = [];
    public function apply(Builder $builder, Model $model)
    {
        if($company_id = request('company_id')){
            $builder->where('company_id', $company_id);
        }
        if($search= request('search')){
            foreach ($this->searchColumn as $column){
                $arr= explode('.', $column);//divide create array
                if(count($arr) == 2){

                    // two data in two variable
                    list($relationship, $col) = $arr;

                    //Search by Foreign key data
                    $builder->orWhereHas($relationship, function ($query) use ($search, $col){
                        $query->where($col, 'LIKE', "%{$search}%");
                    });
                }
                else{
                    $builder->orWhere($column ,'LIKE', "%{$search}%");
                }
            }

        }
    }
}
