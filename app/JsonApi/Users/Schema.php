<?php

namespace App\JsonApi\Users;

use App\Models\users;
use App\JsonApi\Base\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'Users';
    /**
     * @param users $resource
     *      the domain record being serialized.
     * @return string
     */

    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param users $resource
     *      the domain record being serialized.
     * @return string
     */

    public function getAttributes($resource)
    {
        return [
            'first_name'=> $resource->first_name,
            'last_name'=> $resource->last_name,
            'phone'=> $resource->phone,
            'email'=> $resource->email,
            'userType'=> $resource->userType,
            'password'=> $resource->password,
        ];
    }
}
