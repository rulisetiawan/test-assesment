<?php

namespace App\Services;

use App\Models\Request;
use App\Models\RequestDetail;
use DB;
use Illuminate\Http\Request as HttpRequest;

class RequestService
{
    public function index(HttpRequest $request)
    {
        $search = $request->input('search');
        $query = Request::select('requests.id', 'date_time','employees.nik as employee_nik', 'employees.name as employee_name', 'departments.name as department_name')
        ->selectRaw('count(request_details.id) as jumlah_item')
        ->join('employees', 'employees.id', '=', 'requests.employee_id')
        ->join('departments', 'departments.id', '=', 'employees.department_id')
        ->join('request_details', 'requests.id', '=', 'request_details.request_id')
        ->groupBy('requests.id', 'date_time', 'employees.name', 'departments.name');
        if($search || $search != ''){
            $query->where('employees.name','like','%'.$search.'%');
        }
        return $query;

    }

    public function getRequestById($id)
    {
        $requestData = Request::select('requests.id', 'date_time','employees.nik as employee_nik', 'employees.name as employee_name', 'departments.name as department_name')
        ->join('employees', 'employees.id', '=', 'requests.employee_id')
        ->join('departments', 'departments.id', '=', 'employees.department_id')
        ->groupBy('requests.id', 'date_time', 'employees.name', 'departments.name')
        ->where('requests.id',$id)->get();

        $requestDetailsData = Request::select(
            'requests.id',
            'items.name as item_name',
            'locations.location_code as location_code',
            'items.stock',
            'categories.name as category_name',
            'request_details.description',
            'request_details.qty',
            'request_details.status'
        )
        ->join('request_details', 'requests.id', '=', 'request_details.request_id')
        ->join('items', 'request_details.item_id', '=', 'items.id')
        ->join('locations', 'items.location_id', '=', 'locations.id')
        ->join('categories', 'items.category_id', '=', 'categories.id')
        ->groupBy('request_details.request_id','items.name','locations.location_code','items.stock','request_details.description','request_details.qty','request_details.status','categories.name')
        ->where('requests.id', $id)
        ->get();
        return [
            'request' => $requestData,
            'request_details'=>$requestDetailsData
        ];
    }

    public function createRequest($data)
    {
        DB::beginTransaction();
        try {
        // Buat permintaan baru
        $request = Request::create([
            'employee_id' => $data['employee_id'],
            'date_time' => $data['date_time'],
        ]);

        // Tambahkan detail permintaan
        foreach ($data['details'] as $detail) {
            RequestDetail::create([
                'request_id' => $request->id,
                'item_id' => $detail['item_id'],
                'description' => $detail['description'],
                'status' => $detail['status'],
                'qty' => $detail['qty'],
            ]);
        }
        DB::commit();
        return 'berhasil';

        }catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
        
    }

    public function show($id)
    {
        return Request::with('employee', 'details')->findOrFail($id);
    }

    public function update($id, $data)
    {
        $request = Request::findOrFail($id);
        $request->update($data);
        return $request;
    }

    public function delete($id)
    {
        $request = Request::findOrFail($id);
        $request->delete();
        return $request;
    }
}