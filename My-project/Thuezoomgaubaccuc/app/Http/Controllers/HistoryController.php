<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\User;


class HistoryController extends Controller
{
   
    public function plusList(Request $request)
    {
        $query = History::with('user')->where('type', 'plus');
    
     
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
    
        if ($request->filled('plusename')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->plusename . '%');
            });
        }
    
        if ($request->filled('phone')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('phone', 'like', '%' . $request->phone . '%');
            });
        }
    
        if ($request->filled('email')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            });
        }
    
        
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('time', [$request->start_date, $request->end_date]);
        }
    
     
        $pluses = $query->orderBy('time', 'desc')->paginate(10);
    
        
        return view('histories.ListHistoryPlus', compact('pluses'));
    }
    

   
    public function minusList(Request $request)
    {
        $query = History::with('user')->where('type', 'minus');
    
     
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
    
        if ($request->filled('plusename')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->plusename . '%');
            });
        }
    
        if ($request->filled('phone')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('phone', 'like', '%' . $request->phone . '%');
            });
        }
    
        if ($request->filled('email')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            });
        }
    
        
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('time', [$request->start_date, $request->end_date]);
        }
    
     
        $minus = $query->orderBy('time', 'desc')->paginate(10);
    
        
        return view('histories.ListHistoryMinus', compact('minus'));
    }

}
