<?php

namespace App\Http\Controllers\Api\v1\Managment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use ApiControllerTrait;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->apiResponseSuccess([Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(['name' => 'required|string|unique:categories']);

        return $this->apiResponseSuccess([
            Category::create(['name' => $request->name])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $request->validate(['id' => 'required|integer|exists:categories']);

        return $this->apiResponseSuccess([Category::find($request->id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|integer|exists:categories',
            'name' => 'required|string|unique:categories'
        ]);

        return $this->apiResponseSuccess([
            Category::where('id', $request->id)
                ->update(['name' => $request->name])->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $request->validate(['id' => 'required|integer|exists:categories']);
        Category::destroy($request->id);
        return $this->apiResponseSuccess();
    }
}
