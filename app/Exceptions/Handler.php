<?php

namespace Pibbble\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return $this->renderHttpException(new HttpException(404, 'Sorry, This page does not exist.', $e));
        }

        if ($e instanceof OAuthEmailException) {
            return response()->view('errors.oauthemail');
        }

        if ($e instanceof OAuthNameException) {
            $request->session()->put('user', $e->getUser());

            return redirect('/errors/oauthname');
        }

        if ($e instanceof \Swift_TransportException) {
            return response()->view('errors.mailprovider', [], 500);
        } elseif ($this->isHttpException($e)) {
            return $this->renderHttpException($e);
        } else {
            return parent::render($request, $e);
        }
    }
}
