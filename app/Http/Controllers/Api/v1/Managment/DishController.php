<?php

namespace App\Http\Controllers\Api\v1\Managment;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Models\Dish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DishController extends Controller
{
    use ApiControllerTrait;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $dishes = Dish::with('category')->orderBy('created_at', 'desc')->get();

        if ($dishes->isNotEmpty()) {
            return $this->apiResponseSuccess($dishes);
        } else {
            return $this->apiResponseSuccess();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        return $this->apiResponseSuccess(
            Dish::create([
                'name' => $request->name,
                'price' => $request->price,
                'count' => $request->count,
                'category_id' => $request->category_id
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $request->validate(['id' => 'required|integer|exists:dishes']);

        return $this->apiResponseSuccess(Dish::with('category')->find($request->id));

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
            'id' => 'required|integer|exists:dishes',
            'name' => 'nullable|string',
            'price' => 'nullable|integer',
            'count' => 'nullable|integer',
            'category_id' => 'nullable|integer|exists:categories,id'
        ]);

        $dish = Dish::find($request->id);

        if ($request->name) {
            $dish->name = $request->name;
        }
        if ($request->price) {
            $dish->price = $request->price;
        }
        if ($request->count) {
            $dish->count = $request->count;
        }
        if ($request->category_id) {
            $dish->category_id = $request->category_id;
        }
        $dish->save();

        return $this->apiResponseSuccess(
            Dish::where('id', $request->id)->first()
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $request->validate(['id' => 'required|integer|exists:dishes']);

        return $this->apiResponseSuccess(
            Dish::destroy($request->id)
        );
    }
}
