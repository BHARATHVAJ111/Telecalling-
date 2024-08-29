<?php
namespace App\Imports;

use App\Models\Contactdetails;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; // If your file contains a header row

class ExcelTemplate implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

     private $userId;

     public function __construct($userId)
     {
         $this->userId = $userId;
     }

    public function model(array $row)
    {
        // Map the Excel data to your model attributes
        return new Contactdetails([
            'company_name' => $row['company_name'],
            'contact_name' => $row['contact_name'],
            'contact_number' => $row['contact_number'],
            'date' => \Carbon\Carbon::parse($row['date']), // Convert to a Carbon date instance
            'user_id' => $this->userId,
        ]);
    }
    private function excelSerialDateToDate($serialDate)
    {
        return Carbon::createFromFormat('Y-m-d', '1899-12-30')->addDays($serialDate)->toDateString();
    }
}
