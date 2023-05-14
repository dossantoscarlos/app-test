<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.customer.index');
    }

    public function DataTables() 
    {
        return datatables(Customer::all())->toJson();
    }
}
