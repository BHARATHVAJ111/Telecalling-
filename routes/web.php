<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\EngineerStoreController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ServiceHistory;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\QuantityController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\DeniedController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ConvertController;
use App\Http\Controllers\GeneratorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MailController;

use App\Http\Controllers\VisitTwoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\IndentController;
// use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\DashBoard\CustomerController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\VehicleController;
use App\Http\Controllers\Dashboard\SearchController;
use App\Http\Controllers\Dashboard\PricingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TripController;

use App\Http\Controllers\LocationController;
use App\Http\Controllers\VisitFourController;
use App\Http\Controllers\VisitOneController;
use App\Http\Controllers\VisitThreeController;

Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
Route::post('/locations/store', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/autocomplete', [LocationController::class, 'autocomplete'])->name('locations.autocomplete');
Route::resource('roles', RoleController::class);


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
Route::get('/create', function () {
    $model = new App\Models\Jkgenerator();
    $model->name = 'Static Name'; // Insert value statically into the name field
    $model->save();

    // Other logic...
});


Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:1'])->group(function () {
    Route::get('/home/{id}', [HomeController::class, 'superAdmin'])->name('dashboard');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:2'])->group(function () {
    Route::get('/home/{id}', [HomeController::class, 'admin'])->name('dashboard');
});

/*------------------------------------------
--------------------------------------------
All Sales Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:3'])->group(function () {
    Route::get('/admin/home/{id}', [HomeController::class, 'sales'])->name('dashboard');
});

/*------------------------------------------
--------------------------------------------
All Suppliers Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:4'])->group(function () {
    Route::get('/manager/home/{id}', [HomeController::class, 'suppliers'])->name('dashboard');
});
/*------------------------------------------
--------------------------------------------
Store Routes
--------------------------------------------
--------------------------------------------*/

Route::get('/employee/index',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/employee/base',[EmployeeController::class,'baseview'])->name('employee.base');
Route::get('/contact/delete',[EmployeeController::class,'contactbulkdelete'])->name('Contact.delete');
Route::delete('/base/delete',[EmployeeController::class,'basedelete'])->name('base.delete');
Route::post('/employee/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('/employee/edit',[EmployeeController::class,'edit'])->name('employee.edit');
Route::put('/employee/update',[EmployeeController::class,'update'])->name('employee.update');
Route::delete('/employee/delete',[EmployeeController::class,'delete'])->name('employee.delete');



Route::get('/download-excel-template', [EmployeeController::class, 'downloadExcelTemplate'])->name('download.template');
Route::post('/upload-excel', [EmployeeController::class, 'importExcel'])->name('import.excel');

Route::get('/store/index',[StoreController::class,'indexstore'])->name('store.index');
Route::get('/store/report',[StoreController::class,'report'])->name('store.report');
Route::get('/store/parts/show',[StoreController::class,'partsshow'])->name('parts.show');
Route::get('/store/parts/edit', [StoreController::class, 'partsedit'])->name('parts.edit');
Route::put('/store/parts/update', [StoreController::class, 'partsupdate'])->name('parts.update');
Route::delete('store/parts/delete', [StoreController::class, 'partsdelete'])->name('parts.delete');

Route::post('/assets/store', [AssetsController::class, 'storeassets'])->name('assets.store');
Route::get('/assets/{id}/edit', [AssetsController::class, 'assetsedit'])->name('assets.edit');
Route::get('/assets/{id}/assign', [AssetsController::class, 'assign'])->name('parts.asign');


/*------------------------------------------
--------------------------------------------
assets->generator Routes
--------------------------------------------
--------------------------------------------*/


/*------------------------------------------
--------------------------------------------
assets->vehicle Routes
--------------------------------------------
--------------------------------------------*/

Route::get('/vehicle/index',[VehicleController::class,'vehicleindex'])->name('vehicle.index');
Route::post('/vehicle/store',[VehicleController::class,'vehiclestore'])->name('vehicle.store');
Route::get('/vehicle/history',[VehicleController::class,'vehiclehistory'])->name('vehicle.history');
Route::post('/vehicle/history',[VehicleController::class,'vehiclehistorystore'])->name('vehiclehistory.store');
Route::get('/vehicle/view',[VehicleController::class,'historyview'])->name('vehicle.view');
Route::post('/vehicle/show',[VehicleController::class,'show'])->name('vehicle.show');
Route::delete('/vehicle/delete',[VehicleController::class,'vehicledelete'])->name('vehicle.delete');


/*------------------------------------------
--------------------------------------------
quantity Routes
--------------------------------------------
--------------------------------------------*/


/*------------------------------------------
--------------------------------------------
assign Routes
--------------------------------------------
--------------------------------------------*/
Route::post('/assign/store', [AssignController::class, 'store'])->name('assign.store');
/*------------------------------------------
--------------------------------------------
sales Routes
--------------------------------------------
--------------------------------------------*/

/*------------------------------------------
--------------------------------------------
denied Routes
--------------------------------------------
--------------------------------------------*/

Route::get('/denied/store', [DeniedController::class, 'storeanddelete'])->name('denied.store.delete');
Route::get('/follow/denied/store', [DeniedController::class, 'followstoreanddelete'])->name('follow.store.denied');
Route::get('/denied/show', [DeniedController::class, 'deniedshow'])->name('denied.show');
/*------------------------------------------
--------------------------------------------
follow up Routes
--------------------------------------------
--------------------------------------------*/


/*------------------------------------------
--------------------------------------------
convert up Routes
--------------------------------------------
--------------------------------------------*/

Route::get('/converted/store', [ConvertController::class, 'storeanddelete'])->name('converted.store.delete');
Route::get('/followup/store/convert', [ConvertController::class, 'followstoreanddelete'])->name('Followup.store.convert');
Route::get('/converted/show', [ConvertController::class, 'convertshow'])->name('convert.show');

/*------------------------------------------
--------------------------------------------
service Routes
--------------------------------------------
--------------------------------------------*/


/*------------------------------------------
--------------------------------------------
mail Routes
--------------------------------------------
--------------------------------------------*/

Route::get('/viewform',function(){
return view('email');
});


// Route::post('/email/send',[MailController::class,'Emailsend'])->name('send.mail');

/*------------------------------------------
--------------------------------------------
master Routes
--------------------------------------------
--------------------------------------------*/








/*------------------------------------------
--------------------------------------------
service history Routes
--------------------------------------------
--------------------------------------------*/
  
Route::post('/servicehistory/general',[ServiceHistory::class,'general'])->name('service.general');
Route::post('/servicehistory/repair',[ServiceHistory::class,'repair'])->name('service.repair');
Route::post('/servicehistory/oil',[ServiceHistory::class,'oilservice'])->name('service.oil');
Route::post('/servicehistory/date',[ServiceHistory::class,'oilservicedate'])->name('service.date');
Route::post('/servicehistory/mobilization',[ServiceHistory::class,'mobilization'])->name('service.mobilization');
Route::post('/servicehistory/demobilization',[ServiceHistory::class,'demobilization'])->name('service.demobilization');

/*------------------------------------------
--------------------------------------------
Visit One Routes
--------------------------------------------
--------------------------------------------*/
















Route::get('/employees/create', [EmployeeController::class, 'createmployee'])->name('employees.create');
Route::get('/employees/index', [EmployeeController::class, 'indexemployee'])->name('employees.index');
Route::post('/employees', [EmployeeController::class, 'storeemployee'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'editemployee'])->name('employees.edit');
Route::put('/employees/{id}/update', [EmployeeController::class, 'updateemployee'])->name('employees.update');
Route::delete('/employees/{id}/delete', [EmployeeController::class, 'deleteemployee'])->name('employees.destroy');
Route::get('/employees/{id}', [EmployeeController::class, 'viewemployee'])->name('employees.view');






Route::get('/customers', [CustomerController::class, 'indexcustomer'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'createcustomer'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'storecustomer'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'showcustomer'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'editcustomer'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'updatecustomer'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroycustomer'])->name('customers.destroy');






Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/{id}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');






Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

// // routes/web.php
Route::get('/materials/create', [MaterialController::class, 'createMaterial'])->name('materials.create');
Route::post('/materials', [MaterialController::class, 'storeMaterial'])->name('materials.store');
Route::post('/truck-type/store', [TruckController::class,'storeTruck'])->name('trucks.store');
Route::get('/trucks/create', [TruckController::class,'createTruck'])->name('trucks.create');
    
Route::get('/indents', [IndentController::class, 'indexIndent'])->name('indents.index');
Route::get('/indents/create', [IndentController::class, 'createIndent'])->name('indents.create');
Route::post('/indents/store', [IndentController::class, 'storeIndent'])->name('indents.store');
Route::get('/indents/{id}/edit', [IndentController::class, 'editIndent'])->name('indents.edit');
Route::put('/indents/{id}', [IndentController::class, 'updateIndent'])->name('indents.update');
Route::delete('/indents/{id}', [IndentController::class, 'destroyIndent'])->name('indents.destroy');
Route::get('/indents/{indent}', [IndentController::class, 'showIndent'])->name('indents.show');
Route::get('/indents-list', [IndentController::class, 'indent'])->name('indents.indent');
 Route::get('/dashboard', [IndentController::class, 'enquiry'])->name('indents.dashboard');
Route::get('/quoted', [IndentController::class, 'quoted'])->name('fetch-last-two-details');
Route::get('/indent/details', [IndentController::class, 'select'])->name('showIndentDetails');
Route::get('/confirm/{id}', [IndentController::class, 'confirm'])->name('indents.confirm');
Route::get('/confirm-to-trips/{id}', [IndentController::class, 'confirmToTrips'])->name('confirm-to-trips');
Route::get('/cancel-trips/{id}', [IndentController::class,'cancelTrips'])->name('cancel-trips');
Route::get('/recyclebin', [IndentController::class,'recyclebin'])->name('recyclebin.index');
Route::patch('/recyclebin/restore/{id}', [IndentController::class,'restoreIndent'])->name('recyclebin.restore');
Route::post('/cancel-indents-by-locations', [IndentController::class, 'cancelIndentsByLocations'])->name('cancel-indents-by-locations');
Route::get('/confirmed-locations',  [IndentController::class, 'confirmedLocations'])->name('confirmed_locations');
Route::get('/check-location-confirmation/{userId}/{pickupLocationId}/{dropLocationId}', [IndentController::class, 'isLocationConfirmed'])->name('check_location_confirmation');
Route::get('/canceled-indents', [IndentController::class, 'getCanceledIndents'])->name('canceled-indents');
Route::post('/restore-canceled-indent/{id}', [IndentController::class, 'restoreCanceledIndent'])->name('restore-canceled-indent');



Route::get('/confirmed-trips', [TripController::class, 'confirmedTrips'])->name('confirmed-trips');
Route::get('/waitDriver', [TripController::class, 'waitDriver'])->name('waitDriver');



Route::get('/search/customer', [SearchController::class, 'searchCustomer']);
Route::get('/search/employee', [SearchController::class, 'searchEmployee']);
Route::get('/search/indent', [SearchController::class, 'searchIndent']);
Route::get('/search/vehicle', [SearchController::class, 'searchVehicle']);
Route::get('/search/supplier', [SearchController::class, 'searchSupplier']);
Route::get('/search/pricing', [SearchController::class, 'searchPricing']);



Route::get('/rates', [RateController::class, 'indexRate'])->name('rates.index');
Route::get('/rates/{rate}', [RateController::class, 'showRate'])->name('rates.show');
Route::get('/rates/{rate}/edit', [RateController::class, 'editRate'])->name('rates.edit');
Route::put('/rates/{rate}', [RateController::class, 'updateRate'])->name('rates.update');
Route::delete('/rates/{rate}', [RateController::class, 'destroyRate'])->name('rates.destroy');
Route::get('rates/create/{indentId}', [RateController::class, 'createRate'])->name('rates.create');
Route::post('/rates/store', [RateController::class, 'storeRate'])->name('rates.store');




Route::get('/pricings', [PricingController::class, 'index'])->name('pricings.index');
Route::get('/pricings/create', [PricingController::class, 'create'])->name('pricings.create');
Route::post('/pricings', [PricingController::class, 'store'])->name('pricings.store');
Route::get('/pricings/{pricing}', [PricingController::class, 'show'])->name('pricings.show');
Route::get('/pricings/{id}/edit', [PricingController::class, 'edit'])->name('pricings.edit');
Route::put('/pricings/{id}', [PricingController::class, 'update'])->name('pricings.update');
Route::delete('/pricings/{pricing}', [PricingController::class, 'destroy'])->name('pricings.destroy');
