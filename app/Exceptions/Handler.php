<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\ApiResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use ApiResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
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
        $this->renderable(function (Throwable $e) {
            return $this->handleException($e);
        });
    }

    public function handleException(Throwable $e)
    {
        if ($e instanceof MethodNotAllowedHttpException) {
            return $this->sendError('Method for the request is invalid', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($e instanceof NotFoundHttpException) {
            return $this->sendError('URL cannot be found', Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ModelNotFoundException) {
            return $this->sendError("Request not found", Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof HttpException) {
            return $this->sendError($e->getMessage(), $e->getStatusCode());
        }

        if ($e instanceof ValidationException) {
            $errors = $e->validator->errors()->getMessages();
            return $this->sendError($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->sendError('Unexpected Exception', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
