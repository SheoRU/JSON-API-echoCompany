<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Http\Resources\CategoryResource;

class CategoryContorller extends Controller
{
    /**
     * @OA\Get(
     *     path="/categories/?page=",
     *     operationId="categoriesList",
     *     tags={"Categories"},
     *     summary="Выводит список всех категорий",
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
        $categoryrList = Category::paginate(10);
        return CategoryResource::Collection($categoryrList);
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
     *     path="/categories/{category_id}",
     *     summary="Получение определенной категории по ее id",
     *     tags={"Categories"},
     *     description="Получение определенной категории по ее id",
     *     @OA\Parameter(
     *         name="category_id",
     *         in="path",
     *         description="Category id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Category is not found",
     *     )
     * )
     */
    public function show($id)
    {
        return Category::findOrFail($id);
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
     *     path="/categories/search/{field}/{value}",
     *     summary="Поиск необходимой категории по одному из двух параметров",
     *     tags={"Categories"},
     *     description="Поиск необходимой категории по одному из двух параметров",
     *     @OA\Parameter(
     *         name="field",
     *         in="path",
     *         description="Допустимые поля:title,slug",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *      ),
     *         @OA\Parameter(
     *         name="value",
     *         in="path",
     *         description="Значение для поиска",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Category is not found",
     *     )
     * )
     */

    public function search($field,$value)
    {
        switch($field){
            case "title":
                return Category::where('Название','like','%'.$value.'%')->get();
                break;
            case "slug":
                return Category::where('Slug','like','%'.$value.'%')->get();
                break;
        }
    }

    /**
     * @OA\Get(
     *     path="/categories/sort/{value}",
     *     summary="Сортировка категорий по одному из 4 параметров. В Swagger сортировка не отображается, но если отправить запрос напрямую к API, то вернется отсортированный массив",
     *     tags={"Categories"},
     *     description="Сортировка категорий по одному из 4 параметров",
     *     @OA\Parameter(
     *         name="value",
     *         in="path",
     *         description="Допустимые значения для сортировки:id,-id,title,-title. Знак минус означает обратную сортировку",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *      ),
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
                return Category::all()->sortBy('id');
                break;
            case "-id":
                return Category::all()->sortByDesc('id');
                break;
            case "title":
                return Category::all()->sortBy('ФИО');
                break;
            case "-title":
                return Category::all()->sortByDesc('ФИО');
                break;
            default: abort(404);
        }
    }
}
