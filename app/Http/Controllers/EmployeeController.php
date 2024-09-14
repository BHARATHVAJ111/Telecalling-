<?php

namespace App\Http\Controllers;

use App\Exports\Templateexcel;
use App\Http\Controllers\Controller;
use App\Imports\ExcelTemplate;
use App\Models\Audiofiles;
use App\Models\Contactdetails;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{

    public function employee(){

        $engineers=[];
        $employee=Employee::orderBy('name','asc')->get();
        return view('employee.employees', compact('engineers', 'employee'));
    }
    public function index(Request $request)
    {
        
        // $assets = Employee::all();
        $engineers = [];
        $employee = Employee::orderBy('name', 'asc')->get();
        $start = Carbon::today();
        $end = Carbon::today();

        $firstEmployee = Employee::orderBy('name', 'asc')->first();

        $firstEmpAudio = Audiofiles::where('employee_id', $firstEmployee->id)
            ->whereBetween('created_at', [$start->startOfDay(), $end->endOfDay()])
            ->get();

            
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            
            
            
            $AudioFilesSelect = Audiofiles::whereBetween('created_at', [$startDate, $endDate])
            ->where('employee_id', $request->User_id)
            ->get();
            // dd($firstEmpAudio);

        return view('employee.index', compact('engineers', 'employee', 'firstEmpAudio', 'AudioFilesSelect'));
    }

    public function baseview()
    {
        $assets = Employee::all();
        return view('base.index', compact('assets'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|digits:10|unique:employee,mobile',
            'password' => 'required|string|min:8',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with input and errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $password = Hash::make($request->password);

        $employee = Employee::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => $password
        ]);

        return redirect()->back()->with('success', 'Employee added successfully!');
    }

    public function edit(Request $request)
    {
        $employee = Employee::findOrFail($request->id);
        return view('employee.edit', compact('employee'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|digits:10',
            'password' => 'required|string|min:8',
        ];
        $employee = Employee::findOrFail($request->id);
        // Create a validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with input and errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $password = Hash::make($request->password);



        $employee->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => $password
        ]);
        return redirect()->route('employee.index')->with('success', 'Employee update successfully!');
    }


    public function delete(Request $request)
    {
        $employee = Employee::findOrfail($request->id);

        if ($employee) {
            $employee->delete();
        }

        return redirect()->route('employee.index')->withSuccess('Employee Delete Successfully!');
    }
    public function audiodelete(Request $request)
    {

        // dd($request->all());
        $employee = Audiofiles::findOrfail($request->id);

        if ($employee) {
            $employee->delete();
        }

        return redirect()->route('employee.index')->withSuccess('Audio Delete Successfully!');
    }

    public function downloadExcelTemplate()
    {
        return Excel::download(new Templateexcel, 'Template.xlsx');
    }
    public function excelSerialDateToDate($serialDate)
    {
        return Carbon::createFromFormat('Y-m-d', '1899-12-30')->addDays($serialDate)->toDateString();
    }

    public function importExcel(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'User_id' => 'required',
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $file = $request->file('file');
        $userId = $request->input('User_id');

        // Load the data from the file
        $data = Excel::toArray(new ExcelTemplate($userId), $file);

        // Iterate through each sheet
        foreach ($data as $sheet) {
            // Iterate through each row
            foreach ($sheet as $row) {
                // Ensure $row is an array and contains necessary keys
                if (is_array($row)) {
                    // Use the null coalescing operator to provide default values
                    $companyName = isset($row['company_name']) ? $row['company_name'] : 'N/A';
                    $contactName = isset($row['contact_name']) ? $row['contact_name'] : 'N/A';
                    $contactNumber = isset($row['contact_number']) ? $row['contact_number'] : 'N/A';
                    $date = isset($row['date']) ? $this->excelSerialDateToDate($row['date']) : null;

                    // Only create the record if the necessary data is present or default values are set
                    Contactdetails::create([
                        'user_id' => $userId,
                        'company_name' => $companyName,
                        'contact_name' => $contactName,
                        'contact_number' => $contactNumber,
                        'date' => $date,
                    ]);
                }
            }
        }

        return redirect()->route('employee.base')->with('success', 'Excel data imported successfully!');
    }

    public function contactbulkdelete()
    {
        return view('base.delete');
    }

    public function basedelete(Request $request)
    {

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $base = Contactdetails::whereBetween('date', [$startDate, $endDate])->delete();

        if (!$base) {
            return redirect()->back()->witherrors('Given Dates Dont Have Values');
        } else {

            return redirect()->back()->withSuccess('Values Delete Successfully !');
        }
    }

    public function getaudio(Request $request)
    {
        $audio = Audiofiles::where('employee_id', $request->id)->get();
        return view('audio_play', compact('audio'));
    }

    public function callhistory(Request $request)
    {

        // dd($request->all());
        // Convert the dates to the appropriate format if necessary



        return view('employee.index', compact('AudioFilesSelect', 'employee', 'engineers', 'firstEmpAudio'));
    }
}
