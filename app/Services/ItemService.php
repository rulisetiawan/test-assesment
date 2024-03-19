<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemService
{
    public function getAllItems(Request $request)
    {
      
        $search = $request->input('search');
        $query = Item::select(
            'items.id',
            'items.name',
            'items.stock',
            'items.unit',
            'categories.name',
            'locations.name',
            'locations.location_code'
        )
        ->join('locations','locations.id', '=','items.location_id')
        ->join('categories','categories.id', '=','items.category_id');

        if($search || $search !=''){
            $query->where('items.name','like','%'.$search.'%');
        }

        return $query->get();
    }


    public function getItemById($id)
    {
      
        $query = Item::select(
            'items.id',
            'items.name',
            'items.stock',
            'items.unit',
            'categories.name',
            'locations.name',
            'locations.location_code'
        )
        ->join('locations','locations.id', '=','items.location_id')
        ->join('categories','categories.id', '=','items.category_id')
        ->where('items.id',$id);

        return $query->get();
    }

}