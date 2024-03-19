<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(Request $request)
    {
        $items = $this->itemService->getAllItems($request);
        return response()->json([
            'data' => $items
        ]);
    }

    public function show($id)
    {
        $items = $this->itemService->getItemById($id);
        return response()->json([
            'data' => $items
        ]);
    }
}
