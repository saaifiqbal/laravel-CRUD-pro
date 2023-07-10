<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class SearchContactScope extends FilterDataScope
{
    protected $searchColumn = ['first_name', 'last_name', 'email', 'company.name'];
}
