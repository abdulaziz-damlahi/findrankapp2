<?php

namespace App\JsonApi\Packets;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\payment;
use App\JsonApi\Base\AbstractAdapter;
use \App\Models\packets;
use \Illuminate\Http\Request;


use CloudCreativity\LaravelJsonApi\Document\ResourceObject;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Adapter extends AbstractAdapter
{
    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];
    protected $defaultWith = ['websitess'];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new \App\Models\packets(), $paging);
    }

    protected function creating(Request $request)
    {

            $controller = new payment;
            $controller->pay_post($request);


    }
    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */

    protected function filter($query, Collection $filters)
    {
        $query->whereUserId(Auth::id());
        $this->filterWithScopes($query, $filters);
    }

}
