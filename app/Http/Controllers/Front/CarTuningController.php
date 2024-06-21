<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CarTuning;
use App\Models\CarTuningService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarTuningController extends Controller
{
    public function index()
    {
        if(Auth::user() && Auth::user()->brand_id!=null){
            $car_tuning_services = CarTuningService::where('brand_id', Auth::user()->brand_id)
            ->take(10)
            ->paginate(6);

            if (!$car_tuning_services->isEmpty()) {
                $remainingcar_tuning_services = CarTuningService::where('brand_id', '!=', Auth::user()->brand_id)
                    ->take(10 - $car_tuning_services->count())
                    ->paginate(6);
                $car_tuning_services = $car_tuning_services->merge($remainingcar_tuning_services);
            } else {
                $car_tuning_services = CarTuningService::where('brand_id', '!=', Auth::user()->brand_id)
                    ->take(10)
                    ->paginate(6);
            }

        }
        else{
            $car_tuning_services = CarTuningService::
            take(10)
            ->paginate(6);
        }
        return view('front.car-tuning-service',compact('car_tuning_services'));
    }
}
