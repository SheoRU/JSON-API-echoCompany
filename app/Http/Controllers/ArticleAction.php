<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Http\Resources\ArticleResource;
use App\Http\Controllers\BaseController;

class ArticleAction extends Controller
{
    /**
     * @OA\Get(
     *     path="/articles/?page=",
     *     operationId="articlesList",
     *     tags={"Articles"},
     *     summary="Выводит список всех статей",
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
        $articleList = Article::paginate();
        return ArticleResource::Collection($articleList);
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
     *     path="/articles/{id}",
     *     operationId="articleId",
     *     tags={"Articles"},
     *     summary="Получение определенной статьи по ее id",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
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
    public function show($id)
    {   
            return Article::findOrFail($id);
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
     *     path="/articles/search/{field}/{value}",
     *     operationId="articlesList",
     *     tags={"Articles"},
     *     summary="Поиск необходимой статьи по одному из четырех параметров",
     *      @OA\Parameter(
     *         name="field",
     *         in="path",
     *         description="Допустимые поля:author,category,title,slug",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Parameter(
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
     *
     */
    public function search($field,$value)
    {

        switch($field){
            case "author":
                $id=DB::table('authors')->select('id')->where('ФИО','like','%'.$value.'%')->first();
                $param = $id->id;
                return Article::with('authors')->where('author_id','=',$param)->paginate();
                break;
            case "category":
                $id=DB::table('categories')->select('id')->where('Название','like','%'.$value.'%')->first();
                $param = $id->id;
                return Category::with('articles')->where('id','=',$param)->paginate();
                break;
            case "title":
                return Article::where('Название','like','%'.$value.'%')->get();
                break;
            case "slug":
                return Article::where('Slug','like','%'.$value.'%')->get();
                break;
            default: abort(404);
        }
    }

        /**
     * @OA\Get(
     *     path="/articles/sort/{value}",
     *     summary="Сортировка статей по одному из 4 параметров. В Swagger сортировка не отображается, но если отправить запрос напрямую к API, то вернется отсортированный массив",
     *     tags={"Articles"},
     *     description="Сортировка статей по одному из 4 параметров",
     *     @OA\Parameter(
     *         name="value",
     *         in="path",
     *         description="Допустимые значения для сортировки:id,-id,title,-title. Знак минус означает обратную сортировку",
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

    public function sort($value){
        switch($value){
            case "id":
                return Article::all()->sortBy('id');
                break;
            case "-id":
                return Article::all()->sortByDesc('id');
                break;
            case "title":
                return Article::all()->sortBy('Название');
                break;
            case "-title":
                return Article::all()->sortByDesc('Название');
                break;
            default: abort(404);
        }
    }
}