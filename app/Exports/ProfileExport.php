<?php

namespace App\Exports;

use App\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProfileExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Profile::all();
    }
}
