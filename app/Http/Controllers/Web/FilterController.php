<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurEventCalenderModel;
use Illuminate\Support\Facades\DB;
class FilterController extends Controller
{
    public function filterKeywords(Request $request){
        $query = OurEventCalenderModel::query();
        
        if (isset($request->title)) {
            $title = '%' . trim($request->title) . '%';
            $query->where(function($q) use ($title) {
                $q->whereRaw('LOWER(title) LIKE ?', [strtolower($title)])
                  ->orWhereRaw('LOWER(description) LIKE ?', [strtolower($title)]);
            });
        }
        
        if (isset($request->date)) {
            $query->where('event_date', $request->date);
        }
        
        $results = $query->get();
        
        $html = view('web.ajax_load.event_filter', compact('results'))->render();
        return response()->json(['data' => $html]);
    }

    public function filterSearch(Request $request){
        $query = OurEventCalenderModel::query();
        if (isset($request->location)) {
            $location = '%' . trim($request->location) . '%';
            $query->whereRaw('LOWER(location) LIKE ?', [strtolower($location)]);
        }

        if(isset($request->category)){
            if($request->category=="chamber"){
                $query->where('category',1);
            }
            if($request->category=="community"){
                $query->where('category',2);
            }
        }
        
        $results = $query->get();
        
        $html = view('web.ajax_load.event_filter', compact('results'))->render();
        return response()->json(['data' => $html]);
    }
}
