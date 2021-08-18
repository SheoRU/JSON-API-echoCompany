<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;

use App\Http\Resources\AuthorResource;

class AuthorContorller extends Controller
{
    /**
     * @OA\Get(
     *     path="/authors/?page=",
     *     operationId="authorsList",
     *     tags={"Authors"},
     *     summary="Выводит список всех авторов",
     *      @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Номер страницы пагинации",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *    @OA\Response(
     *     response="404",
     *     description="Not found"
     * )
     * )
     *
     */
    public function index()
    {
        $authorList = Author::paginate(10);
        return AuthorResource::Collection($authorList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/authors/{author_id}",
     *     summary="Получение определенного автора по его id",
     *     tags={"Authors"},
     *     description="Получение определенного автора по его id",
     *     @OA\Parameter(
     *         name="author_id",
     *         in="path",
     *         description="Author id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Author is not found",
     *     )
     * )
     */
    public function show($id)
    {
        return Author::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/authors/search/{field}/{value}",
     *     summary="Получение необходимого автора по одному из двух параметров",
     *     tags={"Authors"},
     *     description="Получение необходимого автора по одному из двух параметров",
     *     @OA\Parameter(
     *         name="field",
     *         in="path",
     *         description="Допустимые поля:name,slug",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *         @OA\Parameter(
     *         name="value",
     *         in="path",
     *         description="Значение для поиска",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Article is not found",
     *     )
     * )
     */

    public function search($field,$value)
    {
        switch($field){
            case "name":
                return Author::where('ФИО','like','%'.$value.'%')->get();
                break;
            case "slug":
                return Author::where('Slug','like','%'.$value.'%')->get();
                break;
        }
    }

    /**
     * @OA\Get(
     *     path="/authors/sort/{value}",
     *     summary="Сортировка авторов по одному из 4 параметров. В Swagger сортировка не отображается, но если отправить запрос напрямую к API, то вернется отсортированный массив",
     *     tags={"Authors"},
     *     description="Сортировка авторов по одному из 4 параметров",
     *     @OA\Parameter(
     *         name="value",
     *         in="path",
     *         description="Допустимые значения для сортировки:id,-id,name,-name.Знак минус означает обратную сортировку",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Author is not found",
     *     )
     * )
     */

    public function sort($value){
        switch($value){
            case "id":
                return Author::all()->sortBy('id');
                break;
            case "-id":
                return Author::all()->sortByDesc('id');
                break;
            case "name":
                return Author::all()->sortBy('ФИО');
                break;
            case "-name":
                return Author::all()->sortByDesc('ФИО');
                break;
            default: abort(404);
        }
    }
}
