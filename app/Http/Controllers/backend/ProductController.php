<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkpermission('product-list');
        $product = Product::join('productcategories', 'products.productcategory_id', '=', 'productcategories.id')
            ->select('products.*', 'productcategories.name as n')
            ->get();
        return view('backend.product.list', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkpermission('product-create');
        $productcategory = Productcategory::all();
        return view('backend.product.create', compact('productcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'productcategory_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:products',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $message = Product::create([
            'productcategory_id' => $request->productcategory_id,
            'name' => $request->name,
            'code' => $request->code,
            'quantity' => $request->quantity,
            'stock' => $request->quantity,
            'price' => $request->price,
            'status' => $request->status,
            'created_by' => Auth::user()->username,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($message) {
            return redirect()->route('product.list')->with('success_message', 'successfully created ');
        } else {
            return redirect()->route('product.create')->with('error_message', 'Failed To create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkpermission('product-edit');
        $product = Product::find($id);
        $productcategory = Productcategory::all();
        return view('backend.product.edit', compact('product', 'productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productcategory_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'quantity' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);
        $pc = Product::find($id);
        $pc->productcategory_id = $request->productcategory_id;
        $pc->name = $request->name;
        $pc->code = $request->code;
        $pc->quantity = $request->quantity;
        $pc->stock = $request->stock;
        $pc->price = $request->price;
        $pc->status = $request->status;
        $pc->modified_by = Auth::user()->username;
        $pc->updated_at = date('Y-m-d H:i:s');
        $message = $pc->update();
        if ($message) {
            return redirect()->route('product.list')->with('success_message', 'successfully updated');
        } else {
            return redirect()->route('product.update')->with('error_message', 'failed to  update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = $this->checkpermission('product-delete');
        if ($check) {
            $this->checkpermission('product-delete');
        } else {
            $product = Product::find($id);
            $message = $product->delete();
            if ($message) {
                return redirect()->route('product.list')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('product.update')->with('error_message', 'failed to  Delete');
            }
        }
    }

    public function stockedit($id)
    {
        $product = Product::find($id);
        return view('backend.product.stockupdate', compact('product'));
    }

    public function stockupdate(Request $request, $id)
    {
        $this->validate($request, [
            'stock' => 'required',
        ]);
        $pc = Product::find($id);
        $pc->stock = $pc->stock + $request->stock;
        $pc->quantity = $pc->quantity + $request->stock;
        if ($pc->update()) {
            return redirect()->route('product.list')->with('success_message', 'successfully updated Your Stock');
        } else {
            return redirect()->route('stock.update')->with('error_message', 'failed to  update');
        }
    }
}
