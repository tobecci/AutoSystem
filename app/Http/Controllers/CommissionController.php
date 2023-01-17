<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Builder;

class CommissionController extends Controller
{

    public function __construct()
    {
        $this->fields = ['company', 'car_no', 'model', 'claim', 'checker', 'commission', 'payable', 'status'];
    }

    public function index(Builder $builder)
    {

        if (request()->ajax()) {
            return DataTables::of(Commission::query())
                ->addColumn('action', function ($record) {
                    $disabled = '';
                    $iconPath = asset('images/redcrab_50x50.png');
                    foreach ($this->fields as $key => $value) {
                        if ($record->$value &&
                            $record->$value !== 0 &&
                            $record->$value !== 'Car number' &&
                            $record->$value !== 'Company') {
                            $iconPath = asset('images/greycrab_50x50.png');
                            $disabled = 'pointer-events: none';
                        }
                    }
                    return ' <a style="' . $disabled . '" class="delete-commission-record" data-remote="/commission/' . $record->id . '" href="#"><img style="object-fit:contain;height:30px;cursor:pointer" src="' . $iconPath . '" alt="something"></a>';
                })
                ->editColumn('car_no', function ($record) {
                    return '<div onclick="edit_car_number(' . $record->id . ')" class="modal-link">' . $record->car_no . '</div>';
                })
                ->editColumn('company', function ($record) {
                    return '<div onclick="edit_company(' . $record->id . ')" class="modal-link">' . $record->company . '</div>';
                })
                ->editColumn('claim', function ($record) {
                    return '<div onclick="edit_claim(' . $record->id . ')" class="modal-link">' . number_format($record->claim / 100, 2) . '</div>';
                })
                ->editColumn('commission', function ($record) {
                    return '<div onclick="edit_commission(' . $record->id . ')" class="modal-link">' . number_format($record->commission / 100, 2) . '</div>';
                })
                ->editColumn('payable', function ($record) {
                    return '<div onclick="edit_payable(' . $record->id . ')" class="modal-link">' . number_format($record->payable / 100, 2) . '</div>';
                })

                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns([
                    'car_no',
                    'action',
                    'company',
                    'claim',
                    'commission',
                    'payable',
                ])
                ->toJson();
        }

        $html = $builder->setTableId('commission_record');

        return view('commission.commission', compact('html'));
    }

    public function addRecord(Request $req)
    {
        $record = new Commission();
        $record->save();
        return response()->json(['status' => true]);
    }

    public function delete($id)
    {
        $bill = Commission::find($id);
        $bill->delete();
        return response()->json(['status' => true]);
    }

    public function get_one_commissionrecord(Request $req, $id)
    {
        $commissionrecord = Commission::with(['commcompany', 'commclaim', 'commpayable'])->find($id);
        if (!$commissionrecord) {
            return response()->json([
                'status' => 404,
            ]);
        }
        return response()->json([
            'status' => 200,
            'data' => $commissionrecord->toArray(),
        ]);
    }

    public function update_commissionrecord(Request $request)
    {
        $query = $request->query();
        $row = Commission::with(['commcompany', 'commclaim', 'commpayable'])->find($query['id']);

        info('query=', $query);

        foreach ($query as $column => $value) {
            if (is_array($query[$column])) {
                if ($column === 'commcompany') {
                    $row[$column]['commission'] = $query[$column]['commission'];
                    $row[$column]['company_name'] = $query[$column]['company_name'];
                    $row[$column]['referrer_name'] = $query[$column]['referrer_name'];
                }
                if ($column === 'commclaim') {
                    $row[$column]['total_amount'] = $query[$column]['total_amount'];
                    $row[$column]['lawyer_commission'] = $query[$column]['lawyer_commission'];
                    $row[$column]['adjuster_fee'] = $query[$column]['adjuster_fee'];
                    $row[$column]['from_lawyer'] = $query[$column]['from_lawyer'];
                }
                if ($column === 'commpayable') {
                    $row[$column]['total_amount'] = $query[$column]['total_amount'];
                    $row[$column]['adjuster_fee'] = $query[$column]['adjuster_fee'];
                    $row[$column]['service_charge'] = $query[$column]['service_charge'];
                    $row[$column]['document_fee'] = $query[$column]['document_fee'];
                    $row[$column]['comm'] = $query[$column]['comm'];
                    $row[$column]['payable_to_workshop'] = $query[$column]['payable_to_workshop'];
                    $row[$column]['deduct_amount'] = $query[$column]['deduct_amount'];
                    $row[$column]['claim'] = $query[$column]['claim'];

                }
            } else {
                $row[$column] = $value;
            }
        }
        $row->push();
        return response()->json([
            'status' => 201,
        ]);
    }

    public function get_checker(Request $request){
        $checker = Auth::user()->name . " " . Carbon::now()->format('dMy h:i:s');

        return response()->json([
            'status' => 201,
            'data' => $checker
        ]);
    }

}
