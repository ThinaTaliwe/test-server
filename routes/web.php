<?php
/**
 * Web routes for the application.
 *
 * PHP version 9
 *
 * @author    Siyabonga Alexander Mnguni <alexmnguni57@gmail.com>
 * @author    Thina Taliwe <thina.taliwe2@gmail.com>
 * @copyright 2023 1Office
 * @license   MIT License
 * @link      https://github.com/alexmnguni57/1Office-GBA
 */

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\MyWelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipsController;
use App\Http\Middleware\WelcomesNewUsers as MiddlewareWelcomesNewUsers;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\WelcomeNotification\WelcomeController;
use App\Http\Controllers\DependantsController;
use App\Http\Controllers\SalesTransactionController;
use App\Http\Controllers\CommissionRateController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisteredUserController;
use Barryvdh\Debugbar\Facade as Debugbar;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LayoutController;
use App\Models\LayoutPreference;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AmChartController;
use App\Http\Middleware\SecretCodeMiddleware;
use App\Http\Middleware\CheckMacAddress;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\MacAddressController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\WhatsAppWebhookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Classifications\CustomerClassController;

// ---------------- Sanitizer -----------------------------------------
/* These Are For Mappings */
use App\Http\Controllers\MappingController;

/* These Are For Transfers */
use App\Http\Controllers\DataTransferController;

/* These Are For Presets */
use App\Http\Controllers\PresetController;

/* These Are For Presets */
use App\Http\Controllers\TransferLogController;

//--------------------------------- Start lededata Routes --------------------------------------------------------------------
Route::get('/member/growth-retention', [ReportController::class, 'membershipGrowthAndRetentionReport'])->name('lededata.growth');
Route::get('/member/profile', [ReportController::class, 'memberProfilesReport'])->name('lededata.profile');
Route::get('/member/demographic', [ReportController::class, 'demographicReport'])->name('lededata.demographics');

Route::get('/member/geographic', [ReportController::class, 'geographicReport'])->name('lededata.geographic');
Route::get('/member/financial', [ReportController::class, 'financialReport'])->name('lededata.finance');
Route::get('/member/lifecycle', [ReportController::class, 'lifecycleReport'])->name('lededata.lifecycle');

Route::get('/member/insurance-claims', [ReportController::class, 'insuranceClaimsReport'])->name('lededata.insurance');
Route::get('/member/communication', [ReportController::class, 'communicationReport'])->name('lededata.communication');
Route::get('/member/audit', [ReportController::class, 'auditReport'])->name('lededata.audit');
//--------------------------------- End lededata Routes --------------------------------------------------------------------

/* These Are For Mappings */
Route::get('/mapper', [MappingController::class, 'showMappingAndPreset'])->name('mapper.index');

Route::get('/tables/{connection}', [MappingController::class, 'getTables']);
Route::get('/columns/{connection}/{table}', [MappingController::class, 'getColumns']);
Route::post('/save-mapping', [MappingController::class, 'saveMapping']);

Route::get('/mappings', [MappingController::class, 'getMappings']);
Route::delete('/delete-mapping/{id}', [MappingController::class, 'deleteMapping']);

/* These Are For Transfers */
Route::get('/transfer', [DataTransferController::class, 'showTransferForm']);
// Route::post('/transfer', [DataTransferController::class, 'transferData']);
Route::post('/mappings', [DataTransferController::class, 'mappings']); //this used to be transfer

// Route::get('/get-mappings/{table}', [DataTransferController::class, 'getMappingsForTable']);
Route::get('/get-mappings/{mapping}', [DataTransferController::class, 'getMappingsForTable']);

Route::post('/run-script', [DataTransferController::class, 'runScript']);
Route::get('/get-databases', [DataTransferController::class, 'getDatabases']);
Route::get('/get-tables/{database}', [DataTransferController::class, 'getTablesForDatabase']);

/* These Are For Presets */
Route::post('/save-preset', [PresetController::class, 'store']);
Route::get('/preset/{id}', [PresetController::class, 'show']);
Route::get('/presets', function () {
    return App\Models\Preset::all();
});
Route::delete('/presets/{preset}', [PresetController::class, 'destroy']);

// These are for Fixer aka TransferLog fixes

Route::get('/fixer', [TransferLogController::class, 'index'])->name('fixer.index');
Route::post('/fixer/fix_missing', [TransferLogController::class, 'fixMissingValues']);
Route::post('/fixer/fix_unmatched', [TransferLogController::class, 'fixUnmatchedValues']);

Route::get('modules', [TransferLogController::class, 'getModules']);
Route::get('modules/{module}/components', [TransferLogController::class, 'getComponents']);

Route::get('/modules/{module}/components/{component}/logs', [TransferLogController::class, 'getLogs']);

Route::post('/fixer/fix_log/{log}', [TransferLogController::class, 'fixLog']);

// ---------------- Sanitizer -----------------------------------------

Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
Route::get('/reports/{report}', [ReportsController::class, 'show'])->name('reports.show');
Route::post('/reports', [ReportsController::class, 'store'])->name('reports.store');

Route::get('/reports/{report}/export/csv', [ReportsController::class, 'exportCsv'])->name('reports.export.csv');
Route::get('/reports/{report}/export/pdf', [ReportsController::class, 'exportPdf'])->name('reports.export.pdf');

Route::get('/chart', [ChartController::class, 'show'])->name('chart');
Route::post('/generate-pdf', [ChartController::class, 'generatePdf'])->name('generate-pdf');

Route::get('/get-chart-data', [ChartController::class, 'getData']);

Route::get('/report', [ChartController::class, 'index'])->name('report.index');
Route::get('/person', [ChartController::class, 'personIndex'])->name('report.person');

// Route::get('/home', 'LayoutController@show')->name('home');
Route::get('/home', [LayoutController::class, 'show'])->name('home');
Route::get('/admin', [LayoutController::class, 'show'])->name('home');
// Route::post('/selectLayout', 'LayoutController@selectLayout')->middleware('role')->name('selectLayout');
Route::post('/selectLayout', [LayoutController::class, 'selectLayout'])
    ->middleware('role')
    ->name('selectLayout');

Route::post('/set-layout', function (Request $request) {
    // Save the selected layout index to the session
    $request->session()->put('selectedLayoutIndex', $request->selectedLayoutIndex);

    return back();
});

Route::get('/reporting', [ReportsController::class, 'getReport'])->name('reporting');
Route::get('users/export', [UsersController::class, 'export']);

// Route::get('recentlyAddedPersons', 'ChartController@recentlyAddedPersons');
Route::get('/person', [ChartController::class, 'personIndex'])->name('report.person');

Route::group(['middleware' => ['web']], function () {
    /**
     * Route for displaying the login view.
     */
    Route::get('/login', function () {
        return View('auth.login');
    })->name('login');

    /**
     * Route for displaying the register view.
     */
    Route::get('/register', function () {
        return View('auth.register');
    })->name('register');

    /**
     * Route for registering a user.
     */
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

    /**
     * Route for user authentication.
     */
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

/**/ //////////////////////  Start Mac Address Middleware Access /////////////////////////////////////*/

Route::get('/tts', function () {
    return view('authorize');
})->middleware('checkMacAddress');

Route::get('/get-mac-address', [MacAddressController::class, 'getMacAddress']);

/**/ //////////////////////  End Mac Address Middleware Access ///////////////////////////////////*/

Route::get('/', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

/**
 * Route for displaying the homepage.
 */
Route::get('/admin/edit-account-info', function () {
    return view('user.show');
})
    ->middleware(['auth'])
    ->name('usershow');

Route::post('/direction-switch', function () {
    request()->validate([
        'direction' => 'required|in:ltr,rtl',
    ]);
    Session::put('appdirection', request('direction'));

    return back();
})->name('direction.switch');

Route::post('/language-switch', function () {
    request()->validate([
        'language' => 'required|in:en,af',
    ]);

    Session::put('applocale', request('language'));

    return back();
})->name('language.switch');

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

Route::get('/testingview', function () {
    return view('main2');
})->name('testingview');

// ----------------Start Sales commissions------------------------
Route::get('commissions', [CommissionRateController::class, 'index'])->name('commission.index');
Route::get('sales', [SalesTransactionController::class, 'index'])->name('sales.index');
Route::get('sales/report', [SalesTransactionController::class, 'generateReport'])->name('sales.report');

Route::get('sales/create', [SalesTransactionController::class, 'create'])->name('sales.create');
Route::post('sales/store', [SalesTransactionController::class, 'store'])->name('sales.store');

Route::get('commission/create', [CommissionRateController::class, 'create'])->name('commission.create');
Route::post('commission/store', [CommissionRateController::class, 'store'])->name('commission.store');
// ----------------End Sales commissions----------------------------

Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show']);

Route::post('/save-styles', [App\Http\Controllers\UserController::class, 'saveStyles']);

Route::get('/customize', [App\Http\Controllers\UserController::class, 'index'])->name('customize');

Route::get('/dynamic_styles', [App\Http\Controllers\UserController::class, 'index2'])->name('dynamic_styles');

// ------------------------ Start WhatsApp Routes ----------------------------------------------

Route::get('/whatsapp', [WhatsAppController::class, 'showForm'])->name('whatsapp');
Route::post('/whatsapp/send', [WhatsAppController::class, 'sendMessage'])->name('sendWhatsAppMessage');

Route::get('/whatsapp/webhook', [WhatsAppController::class, 'receiveMessage']);
Route::get('/whatsapp/messages', [WhatsAppController::class, 'showMessages'])->name('whatsappMessages');

// ------------------------  End WhatsApp Routes ---------------------------------------------

Route::get('/settings', function () {
    return view('settings');
})
    ->middleware(['auth'])
    ->name('settings');

/**
 * Route for displaying the homepage.
 */
Route::get('/contact', function () {
    return view('user-settings');
})
    ->middleware(['auth'])
    ->name('user-settings');

/**
 * Route for displaying the member view.
 */
Route::get('/member', function () {
    return view('view-member');
})->middleware(['auth']);

/**
 * Routes for Spatie Welcome Notification.
 */
Route::group(['middleware' => ['web', MiddlewareWelcomesNewUsers::class]], function () {
    /**
     * Route for displaying the welcome form.
     */
    Route::get('welcome/{user}', [MyWelcomeController::class, 'showWelcomeForm'])->name('welcome');

    /**
     * Route for saving the user's password.
     */
    Route::post('welcome/{user}', [UserController::class, 'savePassword'])->name('savePassword');
});

/**
 * Route for saving user information.
 */
Route::post('onboarding/{user}', [MyWelcomeController::class, 'saveUserInfo'])
    ->middleware(['auth'])
    ->name('save-user-info');

/**
 * Route for displaying the add user info form.
 */
Route::get('onboarding/{user}', [WelcomeController::class, 'showAddUserInfoForm'])
    ->middleware(['auth'])
    ->name('onboarding');

/**
 * Routes for memberships.
 */
Route::get('/memberships', 'App\Http\Controllers\MembershipsController@index')
    ->middleware(['auth'])
    ->name('memberships');

Route::controller(MembershipsController::class)->group(function () {
    /**
     * Route for displaying the membership index.
     */
    Route::get('/memberships', 'index')
        ->middleware(['auth'])
        ->name('memberships');

    /**
     * Route for displaying a member.
     */
    Route::get('/view-member/{id}', 'show')
        ->middleware(['auth'])
        ->name('view-member');

    /**
     * Route for editing a member.
     */
    Route::get('/edit-member/{id}', 'edit')
        ->middleware(['auth'])
        ->name('edit-member');

    /**
     * Route for cancelling a member.
     */
    Route::get('/cancel-member/{id}', 'delete')
        ->middleware(['auth'])
        ->name('cancel-member');

    /**
     * Route for adding a member.
     */
    Route::get('/add-member', 'create')
        ->middleware(['auth'])
        ->name('add-member');
    Route::post('/add-member', 'store')->name('add-member.store');
});

//**----------------------------- Logs Routes ----------------------------*\

Route::get('/logs', [LogController::class, 'show'])->name('logs.show');

//**----------------------------- Logs Routes ----------------------------*\

/**
 * Routes for dependants.
 */
// Route::get('/dependants', 'App\Http\Controllers\DependantsController@index')->middleware(['auth'])->name('dependants');
Route::middleware('auth')->group(function () {
    Route::get('/dependants', [DependantsController::class, 'index'])->name('dependants');
});

/**
 * Route for adding a dependant.
 */
Route::post('/add-dependant', 'App\Http\Controllers\DependantsController@store')->name('add-dependant.store');

/**
 * Route for removing a dependant.
 */
Route::get('/remove-dependant/{id}', 'App\Http\Controllers\DependantsController@delete')
    ->middleware(['auth'])
    ->name('remove-dependant');


/////////////////////////////////////// Start Classification Routes //////////////////////////////////////////////////////////////////////////////////////

Route::get('/classification', [CustomerClassController::class, 'index'])->name('classification');

Route::middleware('auth')->group(function () {

    // Route::resource('customers', 'CustomerController');
    Route::resource('customer_classes', CustomerClassController::class);
    Route::resource('customer-class-types', CustomerClassTypeController::class);
    Route::resource('customer-class-type-lists', CustomerClassTypeListController::class);


    Route::get('/get-class-type-list/{id}', [CustomerClassController::class, 'getClassTypeList']);

    // Gets all the classifications for a customer
    Route::get('customer_classes/customer/{customer}', [CustomerClassController::class, 'classesForCustomer']);


    Route::post('/update-current-bu', [UserController::class, 'updateCurrentBu'])->name('users.updateCurrentBu');
});
////////////////////////////////////// End Classification Routes //////////////////////////////////////////////////////////////////////////////////////////////
require __DIR__ . '/auth.php';
