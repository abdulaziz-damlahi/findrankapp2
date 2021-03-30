<?php

namespace App\JsonApi\Packets;

use App\JsonApi\Base\SchemaProvider;
use App\Models\packets;

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
            'id_sa'=> $resource->id_sa,
            'user_id'=> $resource->user_id,
            'count_of_words'=> $resource->count_of_words,
            'descrpitions'=> $resource->descrpitions,
            'end_of_pocket'=> $resource->end_of_pocket,
            'rank_follow'=> $resource->rank_follow,
            'paymentId'=> $resource->paymentId,
            'rank_follow_max'=> $resource->rank_follow_max,
            'max_count_of_words'=> $resource->max_count_of_words,
            'max_count_of_websites'=> $resource->max_count_of_websites,
            'count_of_websites'=> $resource->count_of_websites,
            'packet_names'=> $resource->packet_names,
            'updatedAt' => $resource->updated_at,
            'createdAt' => $resource->created_at,
        ];
    }

//    public function getRelationships($resource, $isPrimary, array $includeRelationships)
//    {
//        return [
//            'websites' => [
//                self::SHOW_SELF => true,
//                self::SHOW_RELATED => true,
//                self::SHOW_DATA => isset($includeRelationships['websitess']),
//                self::DATA => function () use ($resource) {
//
//                    return $resource->createdBy;
//                },
//            ],
//        ];
//    }


}


