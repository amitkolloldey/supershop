<?php

namespace App\Http\Controllers\backend;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkpermission('purchase-list');
        $rempurchase = Purchase::orderBy('created_at', 'DEC')->where('dueamount', '>', 0)->get();
        $paidpurchase = Purchase::orderBy('created_at', 'DEC')->where('dueamount', '<=', 0)->get();
        return view('backend.purchase.list', compact('paidpurchase', 'rempurchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkpermission('purchase-create');
        return view('backend.purchase.create');
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
            'goods_name' => 'required',
            'party_name' => 'required',
            'totalamount' => 'required',
            'paidamount' => 'required',
        ]);
        $purchase = new Purchase();
        $purchase->goods_name = $request->goods_name;
        $purchase->party_name = $request->party_name;
        $purchase->totalamount = $request->totalamount;
        $purchase->paidamount = $request->paidamount;
        $purchase->dueamount = $request->totalamount - $request->paidamount;
        $purchase->status = $request->status;
        $purchase->purchase_date = date('Y-m-d H:i:s');
        $purchase->created_by = Auth::user()->username;
        $purchase->created_at = date('Y-m-d H:i:s');
        if ($purchase->save()) {
            return back()->with('success_message', 'Success Fully created');
        } else {
            return back()->with('error_message', 'Failed To create');
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
        //
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
        $check = $this->checkpermission('purchase-update');
        if ($check) {
            $this->checkpermission('purchase-update');
        } else {
            $purchase = Purchase::find($id);
            $purchase->dueamount = 0;
            $purchase->paidamount = $purchase->totalamount;
            $purchase->update();
            return redirect()->back()->with('success_message', 'successfully paid Remining Balance');
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
        //
    }

    public function export(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $status = $request->status;
        if ($status == 'all'){
            $report = Purchase::orderBy('purchase_date','DEC')->whereBetween('purchase_date', [$start, $end])->get();
            $pdf = PDF::loadview('backend.pdfbill.purchasereport', compact('report', 'start', 'end'));
            if ($pdf){
                return $pdf->download('allpurchasereport.pdf');
            }
            return redirect()->back()->with('error_message', 'Can not Export Report');
        }else {
            $report = Purchase::orderBy('purchase_date','DEC')->whereBetween('purchase_date', [$start, $end])->where('status',[$status])->get();
            $pdf = PDF::loadview('backend.pdfbill.purchasereport', compact('report', 'start', 'end'));
            if ($pdf){
                return $pdf->download('purchasereport.pdf');
            }
            return redirect()->back()->with('error_message', 'Can not Export Report');
        }
    }
}
