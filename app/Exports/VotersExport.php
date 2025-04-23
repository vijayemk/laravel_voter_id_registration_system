<?php

namespace App\Exports;

use App\Models\Voter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VotersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Voter::select('id', 'first_name', 'last_name', 'email', 'mobile', 'district', 'state', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Mobile',
            'District',
            'State',
            'Created At',
            'Updated At',
        ];
    }
}
