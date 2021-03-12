<?php

namespace App\JsonApi\PacketsReels;

use App\JsonApi\Base\SchemaProvider;
use App\Models\packets;
use App\Models\packets_reels;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'packets-reels';

    /**
     * @param packets_reels $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param packets_reels $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getAttributes($resource)
    {
        return [
            'word_count'=>$resource->word_count,
            'description'=>$resource->description,
            'websites_count'=>$resource->websites_count,
            'names_packets'=>$resource->names_packets,
            'createdAt' => $resource->created_at,
            'rank_fosllow' => $resource->rank_fosllow,
            'price' => $resource->price,
            'updatedAt' => $resource->updated_at,
        ];
    }
}
