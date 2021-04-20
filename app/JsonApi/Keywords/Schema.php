<?php

namespace App\JsonApi\Keywords;

use App\JsonApi\Base\SchemaProvider;
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
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'rank' => $resource->rank,
            'different' => $resource->different,
            'website_id' => $resource->website_id,
            'user_id' => $resource->user_id,
            'createdAt' => $resource->created_at,
            'device' => $resource->device,
            'language' => $resource->language,
            'country' => $resource->country,
            'city' => $resource->city,
            'created_At' => $resource->created_At,
            'updated_At' => $resource->updated_At,
        ];
    }
}
