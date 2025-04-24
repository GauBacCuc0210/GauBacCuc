<?php

namespace App\Http\Controllers;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prices = Price::all();
        $query = Price::query();
         
        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

       
        if ($request->has('username') && !empty($request->username)) {
            $query->where('username', 'LIKE', '%' . $request->username . '%');
        }
        if ($request->has('email') && !empty($request->email)) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->has('phone') && !empty($request->phone)) {
            $query->where('phone', 'LIKE', '%' . $request->phone . '%');
        }
        $prices = $query->paginate(10); 
        return view('prices.index', compact('prices'));
    }

    public function create()
    {
        return view('prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'type' => 'required|string',
            'hour' => 'required|integer',
        ]);

        Price::create($request->all());

        return redirect()->route('index.listprice')->with('success', 'Thêm thành công!');
    }

    public function show(Price $price)
    {
        return view('prices.show', compact('price'));
    }

    public function edit($id)
    {
        $price = Price::findOrFail($id); 
        return view('prices.edit', compact('price'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric',
            'type' => 'required|string',
            'hour' => 'required|integer',
        ]);
        $price = Price::findOrFail($id);
        $price->update([
            'price' => $request->price,
            'type' => $request->type,
            'hour' => $request->hour,

        ]);

        return redirect()->route('index.listprice')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $price = Price::find($id);
        $price->delete();
        return redirect()->route('index.listprice')->with('success', 'Xoá thành công!');
    }
}
