<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DoctrineCustomerRepository;
use App\Http\Resources\CustomersResource;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{

    private $customers;

    public function __construct(DoctrineCustomerRepository $customers)
    {
        $this->customers = $customers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customers->findAll();

        return CustomersResource::collection(
            collect($customers)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customers->find($id);

        if (!$customer) {
            return response()->json(
                ['error' => 'Customer does not exist.'],
                404
            );
        }

        return new CustomerResource($customer);
    }
}
