<?php

namespace App\JsonApi\Base;

use Neomerx\JsonApi\Schema\SchemaProvider as LJASchemaProvider;

class SchemaProvider extends LJASchemaProvider
{
    public function getId($resource)
    {
        // TODO: Implement getId() method.
    }

    public function getAttributes($resource)
    {
        // TODO: Implement getAttributes() method.
    }

    /**
     * Get resource links.
     *
     * @param object $resource
     * @param bool $isPrimary
     * @param array $includeRelationships A list of relationships that will be included as full resources.
     *
     * @return array
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        // first degree relationships
        $relationships = [];
        foreach ($includeRelationships as $relName => $value) {
            $relationships[$relName] = self::basicRelationship($relName, get_called_class(), $resource);
        }
        return $relationships;
    }

    function basicRelationship($relationName, $self, $resource, $showData = true)
    {
        $relationNames = explode('.', $relationName);
        return [
            $self::SHOW_SELF => true,
            $self::SHOW_RELATED => true,
            $self::SHOW_DATA => $showData,
            $self::DATA => function () use ($resource, $relationNames) {
                $relation = $resource->{$relationNames[0]};
                if (count($relationNames) > 1) {
                    for ($i = 1; $i < count($relationNames); $i++) {
                        $relation = $relation->{$relationNames[$i]};
                    }
                }
                return $relation;
            }
        ];
    }
}