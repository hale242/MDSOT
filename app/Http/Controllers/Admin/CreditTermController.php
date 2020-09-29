<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DataTables;
use Validator;
use App\Company;
use App\CreditTerm;
use App\CreditTermAmount;

class CreditTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input_all = $request->all();
        $validator = Validator::make($request->all(), [
            // 'credit_term' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {

                $CreditTerm = new CreditTerm;
                $CreditTerm->company_id = $request->input('company_id');
                $CreditTerm->credit_term_amount = $request->input('credit_term');
                $CreditTerm->credit_term_date_start = date('Y-m-d H:i:s');

                if ($request->input('credit_term_status') == 1) {
                    $CreditTerm->credit_term_status = $request->input('credit_term_status');
                    CreditTerm::where('company_id', $request->input('company_id'))
                        ->where('credit_term_status', 1)
                        ->update(['credit_term_status' => 0]);
                }
                else{
                    $CreditTerm->credit_term_status = 0;
                }

                $CreditTerm->save();

                $CreditTermAmount = new CreditTermAmount;
                $CreditTermAmount->company_id = $request->input('company_id');
                $CreditTermAmount->credit_term_amount_price = $request->input('credit_term_amount');
                if ($CreditTermAmount->credit_term_amount_price) {
                    $CreditTermAmount->credit_term_amount_price = str_replace(',', '', $CreditTermAmount->credit_term_amount_price);
                }
                $CreditTermAmount->credit_term_amount_date_start = date('Y-m-d H:i:s');
                $CreditTermAmount->credit_term_amount_status = $request->input('credit_term_status');
                $CreditTermAmount->save();

                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['department_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Department Name is required";
            }
        }
        $return['title'] = 'Insert';
        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function lists(Request $request)
    {
        $result = CreditTerm::select(
            'credit_term.credit_term_id',
            'credit_term.credit_term_amount',
            'credit_term.credit_term_status',
            'credit_term_amount.credit_term_amount_price'
        )
            ->leftjoin('credit_term_amount', 'credit_term_amount.credit_term_amount_id', '=', 'credit_term.credit_term_id');

        $credit_term = $request->input('credit_term');

        if ($credit_term) {
            $result->where('credit_term.company_id', $credit_term);
        }

        return Datatables::of($result)
            ->addIndexColumn()
            ->addColumn('credit_term_amount', function ($res) {
                $amount = $res->credit_term_amount;
                return $amount;
            })
            ->addColumn('credit_term_amount_price', function ($res) {
                $price = number_format($res->credit_term_amount_price);
                return $price;
            })
            ->addColumn('action', function ($res) {
                if ($res->credit_term_status == 1) {
                    $checked = 'checked';
                    $disabled = 'disabled';
                } else {
                    $checked = '';
                    $disabled = '';
                }
               
                $btnStatus = '<input type="checkbox" class="toggle change-status change-credit-status" ' . $checked . ' data-id="' . $res->credit_term_id . '" data-style="ios" data-on="On" data-off="Off" ' . $disabled . '>';
                return $btnStatus;
            })
            ->rawColumns(['checkbox', 'credit_term_amount', 'credit_term_amount_price', 'action'])
            ->make(true);
        return $credit_term;
    }
    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['credit_term_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');

            $CreditTerm = CreditTerm::find($id);


            CreditTerm::where('company_id', $CreditTerm->company_id)
                ->where('credit_term_status', 1)
                ->update(['credit_term_status' => 0]);

            CreditTerm::where('credit_term_id', $id)->update($input_all);
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update Status';
        return $return;
    }
}
