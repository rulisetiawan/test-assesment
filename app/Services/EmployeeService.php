<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeService
{
    public function getAllEmployees(Request $request)
    {
        $search = $request->input('search');
        $query =  Employee::select(
            'employees.id as id',
            'employees.name as employee_name',
            'employees.nik',
        );
        if($search){
            $query->where('nik','like','%'.$search.'%');
        }

        return $query->get();
        
    }

    public function getEmployeeById($id)
    {
        return Employee::select(
            'employees.id as id',
            'employees.name as employee_name',
            'employees.nik',
            'departments.name as department_name'
            )
        ->join('departments','departments.id','=','employees.department_id')
        ->where('employees.id', $id)->first();
    }
}
