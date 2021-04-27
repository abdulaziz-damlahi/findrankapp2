<?php

namespace App\JsonApi\PacketsOfUsers;

use App\Models\users;
use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;
use App\Models\websites;
use CloudCreativity\LaravelJsonApi\Contracts\Validation\ValidatorInterface;
use http\Client\Curl\User;
use Illuminate\Validation\Rule;


class Validators extends AbstractValidators
{

    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *      the allowed paths, an empty array for none allowed, or null to allow all paths.
     */
<<<<<<< HEAD
    protected $allowedIncludePaths = ['users'];
=======
    protected $allowedIncludePaths = ["Users"];
>>>>>>> cdf4e1c76ef04700cb63ec3c9c6a869803d4b410

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = [];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = [];

    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *      the record being updated, or null if creating a resource.
     * @param array $data
     *      the data being validated
     * @return array
     */
    protected function rules($record, array $data): array
    {
        return [
            //
        ];
    }

    /**
     * Get query parameter validation rules.
     *
     * @return array
     */
    protected function queryRules(): array
    {
        return [
            //
        ];
    }

}
