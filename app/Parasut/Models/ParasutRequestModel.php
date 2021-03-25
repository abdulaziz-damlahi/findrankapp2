<?php

namespace App\Parasut\Models;

class ParasutRequestModel
{

    private $id = null;
    private $attr = [];
    private $type = "";
    private $relationships = [];

    /**
     * ParasutRequestModel constructor.
     * @param $id
     * @param $type
     * @param $attr
     * @param array $relationships
     */
    public function __construct($id, $type, $attr, $relationships = [])
    {
        $this->id = $id;
        $this->type = $type;
        $this->attr = $attr;
        $this->relationships = $relationships;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array[]
     */
    public function toArray()
    {
        $data = [
            'id' => $this->id,
            'type' => $this->type,
            'attributes' => $this->attr,
            'relationships' => $this->relationships
        ];
        return ['data' => $data];
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode(self::toArray());
    }


}
