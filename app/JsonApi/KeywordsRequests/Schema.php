<?php

namespace App\JsonApi\KeywordsRequests;
use App\JsonApi\Base\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'keywords-requests';

    /**
     * @param \App\Models\KeywordsRequest $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Models\KeywordsRequest $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getAttributes($resource)
    {
        return [
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,
            'rank' => $resource->rank,
            'keyword_id' => $resource->keyword_id,
            'user_id' => $resource->user_id,
        ];
    }
}
