<?php

namespace App\Parasut;

use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\ParasutRequestModel;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Parasut extends Utils
{
    public const BASE_URL = "https://api.parasut.com/v4/422430/"; // TODO Change Required
    protected const TOKEN_BASE_URL = "https://api.parasut.com/oauth/token";

    static $accessToken = '';
    static $refreshToken = '';
    static $tokenExpiredAt = null;

    static $clientId = null;
    static $clientSecret = null;
    static $username = null;
    static $password = null;

    /**
     * Client constructor.
     * @throws GuzzleException
     */
    public function __construct()
    {
        self::checkAuth();

    }

    /**
     * @throws GuzzleException
     */
    private function checkAuth()
    {
        if (
            empty(self::$tokenExpiredAt) ||
            self::$tokenExpiredAt <= Carbon::now()->addSeconds(-10)
        ) {
            self::login();
        }
    }

    /**
     * @throws GuzzleException
     */
    private function login()
    {
        if (!empty(self::$refreshToken)) {
            $params = [
                'grant_type' => 'refresh_token',
                'client_id' => self::$clientId,
                'client_secret' => self::$clientSecret,
                'refresh_token' => self::$refreshToken
            ];
        } else {
            $params = [
                'grant_type' => 'password',
                'client_id' => self::$clientId,
                'client_secret' => self::$clientSecret,
                'username' => self::$username,
                'password' => self::$password,
            ];
        }
        $response = self::getClient()->post(
            self::TOKEN_BASE_URL,
            ['form_params' => $params]
        );
        $response = self::toArray($response->getBody());

        self::$refreshToken = $response['refresh_token'];
        self::$accessToken = $response['access_token'];
        self::$tokenExpiredAt = Carbon::createFromTimestamp($response['created_at'])->addSeconds($response['expires_in']);
    }

    /**
     * @param ParasutEndPoint $endPoint
     * @param ParasutRequestModel $requestModel
     * @return mixed
     * @throws GuzzleException
     */
    public function create(ParasutEndPoint $endPoint, ParasutRequestModel $requestModel)
    {
        $response = self::request("POST", self::BASE_URL . $endPoint, [], $requestModel->toJson());
        return self::toArray($response->getBody());
    }

    /**
     * @param $method
     * @param $path
     * @param array $query
     * @param array $body
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request($method, $path, $query = [], $body = [])
    {

        $client = self::getClient();
        $options = [
            "query" => $query,
            "headers" => [
                "Content-Type" => "application/vnd.api+json",
                "Authorization" => "Bearer " . self::$accessToken,
                "User-Agent"=>"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36"
            ]
        ];

        if (!empty($body)) {
            $options = array_merge($options, ["body" => $body]);
        }

        return $client->request($method, $path, $options);

    }

    /**
     * @param ParasutEndPoint $endPoint
     * @param $id
     * @param ParasutRequestModel $requestModel
     * @return mixed
     * @throws GuzzleException
     */
    public function update(ParasutEndPoint $endPoint, $id, ParasutRequestModel $requestModel)
    {

        $response = self::request("PUT", self::BASE_URL . $endPoint . '/' . $id, [], $requestModel->toJson());
        return self::toArray($response->getBody());
    }

    public function isEInvoice($vkn)
    {
        $endPoint = ParasutEndPoint::EInvoiceInboxes;
        $response = $this->request('GET', self::BASE_URL . $endPoint, [
            "filter[vkn]" => $vkn
        ], []);
        return $this->toArray($response->getBody())['data'];
    }

}

Parasut::$clientId = '-dzFACO06aYS9hZjajasvbta6zTXCk34SdBhY0sG_UA';
Parasut::$clientSecret = '-nbIAXHyXLKBfsPh0gN3qfcjIfzUHVDSeFyIa2ijFDY';
Parasut::$username = 'td21brs14@hotmail.com';
Parasut::$password = 'brs199714';
