<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Log;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Engine\Logger;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\Models\BillRecord;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    private $fields;

    public function __construct()
    {
        $this->fields = ['car_no' , 'model', 'total', 'cost', 'profitloss', 'referrer', 'ref_fee', 'outstanding', 'balance'];
    }

    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(BillRecord::query())
                ->addIndexColumn()
                ->editColumn('created_at', function ($record) {
                    return '<div onclick="editBillDate(' . $record->id . ')" class="bill--edit-date">' . $record->created_at . '</div>';
                })
                ->editColumn('cost', function ($record) {
                    // return json_encode($record);
                    return '<div onclick="editCost(' . $record->id  .  ')" class="bill--edit-cost">'. number_format($record->cost / 100, 2)  .'</div>';
                })
                ->editColumn('outstanding', function ($record) {
                    // return json_encode($record);
                    return '<div onclick="editOutstanding(' . $record->id  .  ')" class="bill--edit-outstanding modal-link">'. number_format($record->outstanding / 100, 2)   .'</div>';
                })
                ->editColumn('total', function ($record) {
                    // return json_encode($record);
                    return '<div onclick="edit_total(' . $record->id  .  ')" class="modal-link">'. number_format($record->total / 100, 2)  .'</div>';
                })
                ->editColumn('balance', function ($record) {
                    // return json_encode($record);
                    return '<div onclick="edit_balance(' . $record->id  .  ')" class="modal-link">'. number_format($record->balance / 100, 2)  .'</div>';
                })
                ->editColumn('profitloss', function ($record) {
                    // return json_encode($record);
                    return '<div>'. number_format($record->profitloss / 100, 2)  .'</div>';
                })
                ->editColumn('referrer', function ($record) {
                    // return json_encode($record);
                    return '<div onclick="edit_referrer(' . $record->id  .  ')" class="modal-link">'. $record->referrer  .'</div>';
                })
                ->editColumn('ref_fee', function ($record) {
                    // return json_encode($record);
                    return '<div>'. number_format($record->ref_fee / 100, 2)  .'</div>';
                })
                ->addColumn('action', function ($record) {
                    $disabled = '';
                    $iconPath = asset('images/redcrab_50x50.png');
                    foreach ($this->fields as $key => $value) {
                        if ($record->$value &&
							$record->$value !== 0 &&
							$record->$value != 'Referrer') {
                            $iconPath = asset('images/greycrab_50x50.png');
                            $disabled = 'pointer-events: none';
                        }
                    }
                    return ' <a style="' . $disabled . '" class="delete-bill-record" data-remote="/billrecord/' . $record->id . '" href="#"><img style="object-fit:contain;height:30px;cursor:pointer" src="' . $iconPath . '" alt="something"></a>
                    ';
                })
                ->removeColumn('id')
                ->rawColumns(['created_at', 'action', 'car_no', 'cost', 'outstanding', 'total', 'balance', 'profitloss', 'referrer', 'ref_fee'])
                ->toJson();
        }

        $html = $builder->setTableId('bill_record');

        return view('landing.landing', compact('html'));
    }

    public function addRecord (Request $req) {
        $record = new BillRecord();
        $record->save();
        return response()->json(['status' => true]);
    }

    public function delete ($id) {
        $bill = BillRecord::find($id);
        $bill->delete();
        return response()->json(['status' => true]);
    }

    public function getOneBillRecord(Request $req, $id)
    {
        $billRecord = BillRecord::with(['bill_outstanding', 'bill_total', 'bill_balance', 'bill_referrer'])->find($id);
        if(!$billRecord){
            return response()->json([
                'status'=> 404
            ]);
        }
        return response()->json([
            'status'=> 200,
            'data'=> $billRecord->toArray()
        ]);
    }

    public function bill_update(Request $request)
    {
        $query = $request->query();
        $row = BillRecord::with(['bill_outstanding', 'bill_total', 'bill_balance', 'bill_referrer'])->find($query['id']);

        info('query=', $query);

        foreach ($query as $column => $value) {
            if(is_array($query[$column]))
            {
                if($column === 'bill_outstanding')
                {
                    $column_collection = $row[$column];
                    $column_collection->update($query[$column]);
                }
                if($column === 'bill_referrer')
                {
                    $column_collection = $row[$column];
                    $column_collection->update($query[$column]);
                }
                if($column === 'bill_balance')
                {
                    $column_collection = $row[$column];

                    $column_collection->update($query[$column]);
                    info('column' . json_encode($column_collection));
                }
                if($column === 'bill_total')
                {
                    foreach ($query[$column] as $key => $bill_total_item) {
                        foreach ($bill_total_item as $bill_total_key => $value) {

                            $row['bill_total'][$key][$bill_total_key] = $value;
                        }
                    }
                }
            }
            else{
                $row[$column] = $value;
            }
        }
        $row->push();
        return response()->json([
            'status'=> 201
        ]);
    }
}
