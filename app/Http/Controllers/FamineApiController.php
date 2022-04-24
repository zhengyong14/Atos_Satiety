<?php

namespace App\Http\Controllers;

use App\Imports\FaminesImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Famine;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class FamineApiController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'area' => 'nullable',
            'type' => 'nullable'
        ]);
        $famines = Famine::orderBy('acquisition_timestamp','ASC');
        if($request->filled('area')) {
            $famines->where('area', $request['area']);
        }
        if($request->filled('start_date') && $request->filled('end_date')) {
            $start_date = Carbon::createFromFormat('Y-m-d', $request['start_date'])->startOfDay();
            $end_date = Carbon::createFromFormat('Y-m-d', $request['end_date'])->endOfDay();
            $famines->where('acquisition_timestamp', '>=', $start_date)->where('acquisition_timestamp', '<=', $end_date);
        }

        return response()->json([
            'success' => 'Famine data retrieved successfully.',
            'data' => $famines->get()
        ], 201);
    }

    public function heatmap_index(Request $request)
    {
        $this->validate($request, [
            'area' => 'nullable'
        ]);
        $latest_famine_data = Famine::all()->sortByDesc('acquisition_timestamp')->unique('area');
        $result = [];
        foreach ($latest_famine_data as $data) {
            if ($request->filled('area')) {
                if ($data['area'] != $request['area']) {
                    continue;
                }
            }
            $result[] = [
                'id' => $data['id'],
                'acquisition_timestamp' => $data['acquisition_timestamp'],
                'area' => $data['area'],
                'phase' => $data['overall_phase']
            ];
        }
        return response()->json([
            'success' => 'Famine data retrieved successfully.',
            'data' => $result
        ], 201);
    }

    public function uploadContent(Request $request)
    {
        $famines_datas = Excel::toCollection(new FaminesImport, $request->file('file'));
        foreach ($famines_datas[0] as $famines_data) {
            if ($famines_data[0] == 'ACQUISITION_TIMESTAMP') {
                continue;
            }
            $split = explode('/', $famines_data[0]);
            $split_2 = explode(' ', $split[2]);
            $date = Carbon::createFromFormat('Y-m-d', $split_2[0].'-'.$split[1].'-'.$split[0]);
            $validate = Validator::make([
                    'acquisition_timestamp' => $famines_data[0],
                    'area' => $famines_data[1],
                    'week' => $famines_data[2],
                    'NDVI_AGG' => $famines_data[3],
                    'NDWI_AGG' => $famines_data[4],
                    'MOIST_AGG' => $famines_data[5],
                    'overall_phase' => $famines_data[6]
                ]
                ,
                [
                    'acquisition_timestamp' => 'required',
                    'area' => 'required',
                    'week' => 'required',
                    'NDVI_AGG' => 'required',
                    'NDWI_AGG' => 'required',
                    'MOIST_AGG' => 'required',
                    'overall_phase' => 'required'
                ]);
            if ($validate->fails()) {
                continue;
            } else {
                Famine::create([
                    'acquisition_timestamp' => $date,
                    'area' => $famines_data[1],
                    'week' => $famines_data[2],
                    'NDVI_AGG' => $famines_data[3],
                    'NDWI_AGG' => $famines_data[4],
                    'MOIST_AGG' => $famines_data[5],
                    'overall_phase' => $famines_data[6]
                ]);
            }
        }
        return response()->json([
            'success' => 'Excel imported successfully.'
        ], 201);
    }
}
