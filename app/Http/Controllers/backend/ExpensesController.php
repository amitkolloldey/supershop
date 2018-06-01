<?php

namespace App\Http\Controllers\backend;

use App\Models\Expense;
use App\Models\Expensestitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkpermission('expenses-list');
        $expenses = Expense::orderBy('created_at', 'DEC')->get();
        return view('backend.expenses.list', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkpermission('expenses-create');
        $expensesheading = Expensestitle::orderBy('created_at', 'DEC')->get();
        return view('backend.expenses.create', compact('expensesheading'));
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
            'expenses_name' => 'required',
            'party_name' => 'required',
            'totalamount' => 'required',
            'paidamount' => 'required',
            'product_name' => 'required',
        ]);
        $exp = new Expense();
        $exp->expenses_name = $request->expenses_name;
        $exp->party_name = $request->party_name;
        $exp->totalamount = $request->totalamount;
        $exp->paidamount = $request->paidamount;
        $exp->dueamount = $request->totalamount - $request->paidamount;
        $exp->product_name = $request->product_name;
        $exp->created_by = Auth::user()->username;
        $exp->created_at = date('Y-m-d H:i:s');
        if ($exp->save()) {
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
        $this->checkpermission('expenses-edit');
        $expenses = Expense::find($id);
        return view('backend.expenses.edit', compact('expenses'));
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
            'expenses_name' => 'required',
            'party_name' => 'required',
            'totalamount' => 'required',
            'paidamount' => 'required',
            'product_name' => 'required',
        ]);

        $expenses = Expense::find($id);
        $expenses->expenses_name = $request->expenses_name;
        $expenses->party_name = $request->party_name;
        $expenses->totalamount = $request->totalamount;
        $expenses->paidamount = $request->paidamount;
        $expenses->dueamount = $request->totalamount - $request->paidamount;
        $expenses->product_name = $request->product_name;
        $expenses->modified_by = Auth::user()->username;
        $expenses->updated_at = date('Y-m-d H:i:s');
        if ($expenses->update()) {
            return redirect()->route('expenses.list')->with('success_message', 'successfully updated');
        } else {
            return redirect()->route('expenses.update')->with('error_message', 'failed to  update');
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
        $check = $this->checkpermission('expenses-delete');
        if ($check) {
            $this->checkpermission('expenses-delete');
        } else {
            $staff = Expense::find($id);
            $message = $staff->delete();
            if ($message) {
                return redirect()->route('expenses.list')->with('success_message', 'successfully Deleted');
            } else {
                return redirect()->route('expenses.update')->with('error_message', 'failed to  Delete');
            }
        }
    }

    public function expensesheadingcreate()
    {
        $this->checkpermission('expenses-heading');
        return view('backend.expenses.createtitel');
    }

    public function expensesheadingstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $message = Expensestitle::create([
            'name' => $request->name,
        ]);
        if ($message) {
            return back()->with('success_message', 'Success Fully created');
        } else {
            return back()->with('error_message', 'Failed To create');
        }
    }
    public function export()
    {
        $allexpenses = Expense::orderBy('created_at','DEC')->get();
        $pdf = PDF::loadview('backend.pdfbill.expenses', compact('allexpenses'));
        return $pdf->download('expenses.pdf');
    }
}
