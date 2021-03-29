<?php

namespace App\JsonApi\KeywordsRequests;
use App\JsonApi\Base\SchemaProvider;
use App\Models\KeywordRequest;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'keywordsRequests';

    /**
     * @param \App\Models\KeywordsRequest $resource
=======
    /**
     * @param \App\Models\KeywordRequest $resource
>>>>>>> 86c61793713674e13cdc6332e0b0af242aeaab91
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
    /**
     * @param \App\Models\KeywordRequest $resource
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
