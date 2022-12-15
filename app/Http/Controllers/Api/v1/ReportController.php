<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    use ApiControllerTrait;

    public function totalCost()
    {
        $sum = Dish::select(DB::raw('sum(price * count) as total'))->first()->total;
        return $this->apiResponseSuccess((int)$sum);
    }
}
