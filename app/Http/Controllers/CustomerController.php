<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Http\Requests;

class CustomerController extends Controller
{
    /**
     * @param Requests\CreateOrderRequest $request
     * @param CustomerService $service
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function createOrder(Requests\CreateOrderRequest $request, CustomerService $service)
    {
        $result = $service->createOrder($request);

        return response($result);
    }
}
