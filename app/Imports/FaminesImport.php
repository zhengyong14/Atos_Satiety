<?php

namespace App\Imports;

use App\Models\Famine;
use Maatwebsite\Excel\Concerns\ToModel;

class FaminesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Famine([
            'acquisition_timestamp' => $row[0],
            'area' => $row[1],
            'week' => $row[2],
            'NDVI_AGG' => $row[3],
            'NDWI_AGG' => $row[4],
            'MOIST_AGG' => $row[5],
            'overall_phase' => $row[6]
        ]);
    }
}
