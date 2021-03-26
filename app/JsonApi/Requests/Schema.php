<?php

namespace App\JsonApi\Requests;

use App\JsonApi\Base\SchemaProvider;
use \App\Models\requests;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'requests';


    /**
     * @param requests $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param requests $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'input_price'=>$resource->input_price,
            'card_first_last'=>$resource->card_first_last,
            'card_number'=>$resource->card_number,
            'Ay'=>$resource->Ay,
            'Yil'=>$resource->Yil,
            'CVC'=>$resource->CVC,
            'updatedAt' => $resource->updated_at,
            'createdAt' => $resource->created_at,
        ];
    }
}
