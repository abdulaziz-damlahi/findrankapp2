<?php

namespace App\Exceptions;

use CloudCreativity\LaravelJsonApi\Exceptions\HandlesErrors;
use CloudCreativity\LaravelJsonApi\Exceptions\JsonApiException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use HandlesErrors;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        JsonApiException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     * Updated to return json for a request that wantsJson
     * i.e: specifies
     *      Accept: application/json
     * in its header
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $e)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(
                $this->getJsonMessage($e),
                $this->getExceptionHTTPStatusCode($e)
            );
        }
        return parent::render($request, $e);
    }

    protected function getJsonMessage($e){
        // You may add in the code, but it's duplication
        return [
            'status' => 'false',
            'message' => $e->getMessage()
        ];
    }

    protected function getExceptionHTTPStatusCode($e){
        // Not all Exceptions have a http status code
        // We will give Error 500 if none found
        return method_exists($e, 'getStatusCode') ?
            $e->getStatusCode() : 500;
    }

    protected function prepareException(Throwable $e)
    {
        if ($e instanceof JsonApiException) {
            return $this->prepareJsonApiException($e);
        }

        return parent::prepareException($e);
    }
}
