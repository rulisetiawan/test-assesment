<?php

namespace App\Http\Controllers;

use App\Services\RequestService;
use Illuminate\Http\Request as HttpRequest;

class PermintaanBarangController extends Controller
{
    protected $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function index(HttpRequest $request)
    {
        return response()->json(
            $this->requestService->index($request)->paginate()
        );
    }

    public function store(HttpRequest $request)
    {
        return response()->json(
            $this->requestService->index($request)->paginate()
        );
    }

    public function show($id)
    {
        return response()->json(
            $this->requestService->getRequestById($id)
        );
    }

    public function update(HttpRequest $request, $id)
    {
        $data = $request->validate([
          
        ]);

        return response()->json(
            $this->requestService->update($id, $data)
        );
    }

    public function destroy($id)
    {
        return response()->json($this->requestService->delete($id));
    }
}
