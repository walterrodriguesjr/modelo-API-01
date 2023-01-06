<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /* FUNÇÃO QUE RETORNA O ERRO TRATADO AO USUÁRIO DE ENDEREÇO NÃO ENCONTRADO */
    //TRATA O ERRO: NotFoundHttpException
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            /* irá retornar o erro tanto se a requisição for AJAX, e quando não for também */
            if($request->expectsJson()){
                return response()->json(['error' => 'Endereço não encontrado!'], $exception->getStatusCode());
            }else{
                return response()->json(['error' => 'Endereço não encontrado!'], $exception->getStatusCode());

            }
        }

    /* FUNÇÃO QUE RETORNA O ERRO TRATADO AO USUÁRIO DE ESTAR USANDO VERBO HTTP ERRADO */
    //TRATA O ERRO: MethodNotAllowedHttpException
        if ($exception instanceof MethodNotAllowedHttpException) {

            if($request->expectsJson())
                return response()->json(['error' => 'Verbo HTTP incompátivel!']);

        }

        /* if ($exception instanceof EntityValidationException) {
            return $this->showError($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($exception instanceof NotificationException) {
            return $this->showError($exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        } // ok => HTTP_INTERNAL_SERVER_ERROR */

        return parent::render($request, $exception);
    }

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
