<?php

namespace App\JsonApi\Keywords;

use Neomerx\JsonApi\Schema\SchemaProvider;
use App\Models\keywords;
class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'keywords';


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
            'id' => $resource->id,
            'count_of_words' => $resource->count_of_words,
            'descrpitions' => $resource->descrpitions,
            'end_of_pocket' => $resource->end_of_pocket,
            'started_of_pockets' => $resource->started_of_pockets,
            'packet_names' => $resource->packet_names,
            'createdAt' => $resource->created_at,
            'createdAt' => $resource->created_at,
        ];
    }
}
