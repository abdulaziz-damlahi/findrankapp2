<?php

namespace App\JsonApi\Websites;

use Neomerx\JsonApi\Schema\SchemaProvider;
use App\Models\websites;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'Websites';


    /**
     * @param websites $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }


    /**
     * @param websites $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getAttributes($resource)
    {
        return [
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,
            'createdAt' => $resource->created_at,
            'user_id' => $resource->user_id,
            'website_name'=> $resource->website_name,
            'wordcount'=> $resource->wordcount,
            'user_id'=> $resource->user_id,
            'down'=> $resource->down,
            'equal'=> $resource->equal,
            'up'=> $resource->up,


        ];
    }
}
