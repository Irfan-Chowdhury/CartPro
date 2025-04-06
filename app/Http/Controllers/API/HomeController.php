<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;

use App\Services\HomeService;


class HomeController extends Controller
{
    public function index(HomeService $homeService)
    {
        $homeData = $homeService->getHomeData();

        return new HomeResource($homeData);
    }
}
