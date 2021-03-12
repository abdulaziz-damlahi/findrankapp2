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
            'website_name'=> $resource->website_name,
            'id_website'=> $resource->id_website,
            'rank'=> $resource->rank,

        ];
    }
}
