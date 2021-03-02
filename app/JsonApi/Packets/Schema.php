<?php

namespace App\JsonApi\Packets;

use Neomerx\JsonApi\Schema\SchemaProvider;
use App\Models\packets;
use App\Models\websites;


class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'Packets';

    /**
     * @param packets $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param packets $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'count_of_words'=> $resource->count_of_words,
            'descrpitions'=> $resource->descrpitions,
            'end_of_pocket'=> $resource->end_of_pocket,
            'started_of_pockets'=> $resource->started_of_pockets,
            'count_of_websites'=> $resource->count_of_websites,
            'packet_names'=> $resource->count_of_websites,
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,

        ];
    }


}
