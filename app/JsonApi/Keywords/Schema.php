<?php

namespace App\JsonApi\Keywords;

use Neomerx\JsonApi\Schema\SchemaProvider;
use App\Models\keywords;
use App\Models\websites;
class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'Keywords';


    /**
     * @param keywords $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param keywords $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'createdAt' => $resource->created_at,
            'createdAt' => $resource->created_at,
        ];
    }
}
