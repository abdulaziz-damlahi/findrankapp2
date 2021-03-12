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
            'website_to_keyword' => $resource->website_to_keyword,
            'updatedAt' => $resource->updated_at,
            'createdAt' => $resource->created_at,
            'user_id' => $resource->user_id,
            'website_name'=> $resource->website_name,
            'rank'=> $resource->rank,
         ];
    }
}
