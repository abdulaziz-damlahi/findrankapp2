<?php

namespace App\JsonApi\AllGoogleSearchDatas;
use App\JsonApi\Base\SchemaProvider;

use App\Models\AllGoogleSearchDatas;
class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'all-google-search-datas';

    /**
     * @param AllGoogleSearchDatas $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param AllGoogleSearchDatas $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'keyword'=> $resource->keyword,
            'user_id'=> $resource->user_id,
            'website'=> $resource->website,
            'colonial_name'=> $resource->colonial_name,
            'device'=> $resource->device,
            'token'=> $resource->token,
            'language'=> $resource->language,
            'statusofresult'=> $resource->statusofresult,
            'processtime'=> $resource->processtime,
            'created_at'=> $resource->created_at,
            'updated_at'=> $resource->updated_at,
        ];
    }
}
