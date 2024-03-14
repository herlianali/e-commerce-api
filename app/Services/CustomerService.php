<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\CustomerAddress;

class CustomerService extends Service
{

    protected $customer, $customerAddress;
    
    public function __construct(Customer $customer, CustomerAddress $customerAddress)
    {
        $this->customer = $customer;
        $this->customerAddress = $customerAddress;
    }
}