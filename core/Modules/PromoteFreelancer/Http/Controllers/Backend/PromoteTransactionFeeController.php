<?php

namespace Modules\PromoteFreelancer\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PromoteTransactionFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function fee_settings(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate(['promote_transaction_fee_type' => 'required','promote_transaction_fee_charge' => 'required|numeric|min:0']);
            $all_fields = ['promote_transaction_fee_type','promote_transaction_fee_charge'];

            foreach ($all_fields as $field) {
                update_static_option($field, $request->$field);
            }
            toastr_success(__('Transaction Fee Settings Updated Successfully.'));
            return back();
        }
        return view('promotefreelancer::backend.transaction-fee-settings.transaction-fee-settings');
    }
}
