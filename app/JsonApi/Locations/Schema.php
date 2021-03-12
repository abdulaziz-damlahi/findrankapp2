<?php

namespace App\JsonApi\Locations;

use App\Models\locations;
use App\JsonApi\Base\SchemaProvider;
use App\Models\keywords;
use App\Models\websites;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'Locations';
    /**
     * @param locations $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }
    /**
     * @param locations $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getAttributes($resource)
    {
        return [
            'Criteria_ID' => $resource->Criteria_ID,
            'Country_Code' => $resource->Country_Code,
            'name' => $resource->name,
            'Canonical_Name' => $resource->Canonical_Name,
            'descrpitions' => $resource->descrpitions,
            'Parent_ID' => $resource->Parent_ID,
            'Target_Type' => $resource->Target_Type,
            'Status' => $resource->Status,
            'updatedAt' => $resource->updated_at,
            'createdAt' => $resource->created_at,
        ];
    }
}
