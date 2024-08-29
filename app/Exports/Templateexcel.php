<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class Templateexcel implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Return an empty collection to ensure no data rows
        return new Collection([]);
    }

    public function headings(): array
    {
        return [
            'Company Name',
            'Contact Name',
            'Contact Number',
            'Date',
        ];
    }
}
