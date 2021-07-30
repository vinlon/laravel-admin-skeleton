<?php

namespace App\Http\Middleware;

use App\Exceptions\AdminException;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class AdminResponse
{
    /**
     * Handle an incoming request.
     * admin接口数据返回结果内容的处理.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $e = $response->exception;

        $code = 0;
        $httpStatus = 200;
        $message = '';
        $data = null;
        $trace = null;
        if ($e) {
            $code = 'fail';
            if ($e instanceof AdminException) {
                $message = $e->getMessage();
            } else {
                if ($e instanceof ValidationException) {
                    //参数错误
                    $errors = $e->errors();
                    $message = Arr::first($errors)[0];
                    $data = $errors;
                } else {
                    //未知错误
                    $code = 'unknown';
                    $httpStatus = 500;
                    if (config('app.debug', false)) {
                        $message = $e->getMessage();
                        $trace['debug'] = $e->getTrace();
                    } else {
                        $message = '服务器错误';
                    }
                }
            }
            $response = new JsonResponse();
            $response->setData([
                'code' => $code,
                'msg' => $message,
                'data' => $data,
                'trace' => $trace,
            ])->setStatusCode($httpStatus);
        }

        return $response;
    }
}
