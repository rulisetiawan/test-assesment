<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        $employees = $this->employeeService->getAllEmployees($request);
        return response()->json([
           'data' => $employees
        ]);
    }

    public function show($id)
    {
        $employee = $this->employeeService->getEmployeeById($id);
        return response()->json([
            'data' => $employee
        ]);
    }
}