<?php

use App\Http\Controllers\Auth\LoginApiController;
use App\Models\Contactdetails;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/login', function (Request $request) {

  
    $validator = Validator::make($request->all(), [
        'Phone' => ['required|regex:/^(\+?\d{1,3}[-.\s]?)?\d{10}$/'],
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }



    // Retrieve user details from the 'engineer' table based on the provided email
    $employee = Employee::where('mobile', $request->phone)->first();

    

    if (!$employee) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // If the engineer exists, verify the password
    if (!Hash::check($request->password, $employee->password)) {
        return response()->json(['error' => 'Invalid password'], 401);
    }

    // Attempt to authenticate the user
    if ($employee) {
        // Authentication successful, generate token if needed
        // $token = $engineer->createToken('API Token')->plainTextToken;

        // Return response with token and user data
        return response()->json([
            'user' => $employee,
        ], 200);
    } else {
        // Authentication failed
        return response()->json(['error' => 'Unauthorized'], 401);
    }
});


Route::post('/employee', function (Request $request) {
    
    $validator = Validator::make($request->all(), [
        'employee_id' => 'required|numeric',
        'date'=>'required|date',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
    $date = Carbon::parse($request->date)->format('Y-m-d');
    // Retrieve user details from the 'engineer' table based on the provided email
    $engineer_assign = Contactdetails::where('user_id', $request->employee_id)
    ->where('date',$date)
    ->get();

    if (!$engineer_assign) {
        return response()->json(['error' => 'Engineer not found'], 404);
    }

   

    // Attempt to authenticate the user
    if ($engineer_assign) {
        // Authentication successful, generate token if needed
        // $token = $engineer->createToken('API Token')->plainTextToken;

        // Return response with token and user data
        return response()->json([
            // If the engineer exists, verify the password
            'Employee_details' => $engineer_assign,
        ], 200);
    } else {
        // Authentication failed
        return response()->json(['error' => 'Not Found'], 401);
    }
});