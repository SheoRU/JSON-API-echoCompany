<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 *  @OA\Info(
 *     title="Laravel Swagger API documentation for EchoCompany",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="admin@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Get(
 *     path="/",
 *     description="Home page",
 *     @OA\Response(response="default", description="Welcome page")
 * )
 * @OA\Tag(
 *     name="Authors",
 *     description="Поиск авторов",
 * )
 *  * @OA\Tag(
 *     name="Articles",
 *     description="Поиск статей",
 * )
 *  * @OA\Tag(
 *     name="Categories",
 *     description="Поиск категорий",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://127.0.0.1:8000/api"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="X-APP-ID",
 *     securityScheme="X-APP-ID"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
