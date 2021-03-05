<?php

namespace App\JsonApi\Base;

use CloudCreativity\LaravelJsonApi\Document\ResourceObject;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter as LJAAbstractAdapter;
use Illuminate\Support\Collection;

class AbstractAdapter extends LJAAbstractAdapter
{
    protected function filter($query, Collection $filters)
    {
        // TODO: Implement filter() method.
    }


    protected function setPivotsData(
        $record,
        ResourceObject $resource,
        string $relationName,
        string $foreignKey,
        string $primaryKey = 'id'
    )
    {
        $relationItems = $resource->getRelationships()->toArray()[$relationName]["data"];
        foreach ($relationItems as $item) {
            if (array_key_exists('pivots', $item)) {
                $record->$relationName()
                    ->where($foreignKey, $item[$primaryKey])
                    ->update(self::array_map_assoc(
                        fn($k, $v) => [self::camelToSnake($k), $v],
                        $item["pivots"]
                    ));
            }
        }
    }

    protected function saveSingleRelation($entity, $resource, $relationName)
    {
        if ($resource->has($relationName)) {
            $relation = $resource->get($relationName)['data'];
            $attrs = self::array_map_assoc(
                fn($k, $v) => [self::camelToSnake($k), $v],
                $relation['attributes']
            );
            if ($entity->$relationName) {
                $entity->$relationName()->update($attrs);
            } else {
                $entity->$relationName()->create($attrs);
            }
        }
    }

    /**
     * @param string|array $str
     * @return string|array
     */
    function snakeToCamel($str)
    {
        if (gettype($str) === 'array') {
            return array_map(fn ($s) => self::snakeToCamel($s), $str);
        }
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $str))));
    }
    /**
     * @param string|array $str
     * @return string|array
     */
    function camelToSnake($str)
    {
        if (gettype($str) === 'array') {
            return array_map(fn ($s) => self::camelToSnake($s), $str);
        }
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $str));
    }

    function array_map_assoc(callable $f, array $a) {
        return array_column(array_map($f, array_keys($a), $a), 1, 0);
    }

    protected function saveManyRelation($entity, $resource, $relationName)
    {
        if ($resource->has($relationName)) {
            $relationData = $resource->get($relationName)['data'];

            $willCreate = $willUpdate = [];
            foreach ($relationData as $relation) {
                $attrs = self::array_map_assoc(
                    fn($k, $v) => [self::camelToSnake($k), $v],
                    $relation['attributes']
                );
                if ($relation['id'] ?? false) {
                    $willUpdate[$relation['id']] = $attrs;
                } else {
                    $willCreate[] = $attrs;
                }
            }

            $entity->$relationName()->createMany($willCreate);
            foreach ($willUpdate as $id => $data) {
                $entity->$relationName()->whereId($id)->update($data);
            }
        }
    }
}
