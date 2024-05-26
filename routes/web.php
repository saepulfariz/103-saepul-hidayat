<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TransactionHistoryController;

Route::get('/', function () {
    return view('pages.auth.login');
});

// Route::get('/login', function () {
//     return view('pages.auth.login');
// })->name('auth.login');

// Route::get('/logout', function () {
//     // return redirect()->route('auth.login');
//     return redirect()->to('/login');
// })->name('auth.logout');


// Route::get('/dashboard', function () {
//     $resume = [
//         [
//             'title' => "TODAY'S MONEY",
//             'number' => "$53,000",
//             'percentage' => "+55%",
//             'increst' => true,
//             'since' => "since yesterday",
//             'icon' => "ni ni-money-coins",
//             'icon-bg' => "bg-gradient-primary shadow-primary",
//         ],
//         [
//             'title' => "TODAY'S USERS",
//             'number' => "2,300",
//             'percentage' => "+3%",
//             'increst' => true,
//             'since' => "since last week",
//             'icon' => "ni ni-world",
//             'icon-bg' => "bg-gradient-danger shadow-danger",
//         ],
//         [
//             'title' => "NEW CLIENTS",
//             'number' => "+3,462",
//             'percentage' => "-2%",
//             'increst' => false,
//             'since' => "since last quarter",
//             'icon' => "ni ni-paper-diploma",
//             'icon-bg' => "bg-gradient-success shadow-success",
//         ],
//         [
//             'title' => "SALES",
//             'number' => "$103,430",
//             'percentage' => "+5%",
//             'increst' => true,
//             'since' => "than last month",
//             'icon' => "ni ni-cart",
//             'icon-bg' => "bg-gradient-warning shadow-warnin",
//         ],
//     ];
//     return view('pages.dashboard.index', [
//         'resume' => $resume
//     ]);
// })->name('dashboard.index');

/*
Route::get('/users', function () {
    $users = [
        [
            'id' => 1,
            'name' => 'Ujang',
            'email' => 'Ujang@gmail.com',
            'image' => 'team-2.jpg',
            'role' => 'Admin',
            'npm' => 'D1A200001',
            'is_active' => true,
        ],
        [
            'id' => 2,
            'name' => 'Dadan',
            'email' => 'dadan@gmail.com',
            'image' => 'team-3.jpg',
            'role' => 'Bendahara',
            'npm' => 'D1A200002',
            'is_active' => true,
        ],
        [
            'id' => 3,
            'name' => 'Asep',
            'email' => 'asep@gmail.com',
            'image' => 'team-4.jpg',
            'role' => 'Sekretaris',
            'npm' => 'D1A200003',
            'is_active' => false,
        ],
        [
            'id' => 4,
            'name' => 'Dinda',
            'email' => 'dinda@gmail.com',
            'image' => 'team-1.jpg',
            'role' => 'Member',
            'npm' => 'D1A200004',
            'is_active' => true,
        ]
    ];
    $menu = 'List';
    return view('pages.users.index', compact('users', 'menu'));
})->name('users.index');

Route::get('/users/create', function () {
    $roles = [
        'Admin',
        'Bendahara',
        'Sekretaris',
        'Member',
    ];
    $menu = 'Create';
    return view('pages.users.create', compact('roles', 'menu'));
})->name('users.create');

// route gak wajib dan default null
// Route::get('/users/{id?}', function ($id = null) {
Route::get('/users/{id}', function ($id) {
    $users = [
        [
            'id' => 1,
            'name' => 'Ujang',
            'email' => 'Ujang@gmail.com',
            'image' => 'team-2.jpg',
            'role' => 'Admin',
            'npm' => 'D1A200001',
            'is_active' => true,
        ],
        [
            'id' => 2,
            'name' => 'Dadan',
            'email' => 'dadan@gmail.com',
            'image' => 'team-3.jpg',
            'role' => 'Bendahara',
            'npm' => 'D1A200002',
            'is_active' => true,
        ],
        [
            'id' => 3,
            'name' => 'Asep',
            'email' => 'asep@gmail.com',
            'image' => 'team-4.jpg',
            'role' => 'Sekretaris',
            'npm' => 'D1A200003',
            'is_active' => false,
        ],
        [
            'id' => 4,
            'name' => 'Dinda',
            'email' => 'dinda@gmail.com',
            'image' => 'team-1.jpg',
            'role' => 'Member',
            'npm' => 'D1A200004',
            'is_active' => true,
        ]
    ];

    $result = [];
    if ($id != null) {
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                array_push($result, $user);
                // $result = $user;
            }
        }
    } else {
        // $result = $users;
    }
    // return $result;
    return view('pages.users.show', [
        // 'data' => ($result) ? $result[0] : [],
        'data' => $result[0],
        'menu' => 'Show'
    ]);
})->name('users.show');

Route::get('/users/{id}/edit', function ($id) {
    $users = [
        [
            'id' => 1,
            'name' => 'Ujang',
            'email' => 'Ujang@gmail.com',
            'image' => 'team-2.jpg',
            'role' => 'Admin',
            'npm' => 'D1A200001',
            'is_active' => true,
        ],
        [
            'id' => 2,
            'name' => 'Dadan',
            'email' => 'dadan@gmail.com',
            'image' => 'team-3.jpg',
            'role' => 'Bendahara',
            'npm' => 'D1A200002',
            'is_active' => true,
        ],
        [
            'id' => 3,
            'name' => 'Asep',
            'email' => 'asep@gmail.com',
            'image' => 'team-4.jpg',
            'role' => 'Sekretaris',
            'npm' => 'D1A200003',
            'is_active' => false,
        ],
        [
            'id' => 4,
            'name' => 'Dinda',
            'email' => 'dinda@gmail.com',
            'image' => 'team-1.jpg',
            'role' => 'Member',
            'npm' => 'D1A200004',
            'is_active' => true,
        ]
    ];

    $result = [];
    if ($id != null) {
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                array_push($result, $user);
                // $result = $user;
            }
        }
    } else {
        // $result = $users;
    }

    // return $result;

    $roles = [
        'Admin',
        'Bendahara',
        'Sekretaris',
        'Member',
    ];
    return view('pages.users.edit', [
        // 'data' => ($result) ? $result[0] : [],
        'data' => $result[0],
        'menu' => 'Edit',
        'roles' => $roles
    ]);
})->name('users.edit');
*/

// session
Route::get('/setSession', function () {
    session([
        'nama' => "Andre",
        'umur' => 19,
        'asalkota' => "bandung",
    ]);
    return "Session telah Ditambahkan";
});

Route::get('/getSession', function () {
    return [
        'nama' => session()->get('nama'),
        'umur' => session()->get('umur'),
        'asalkota' => session()->get('asalkota'),
    ];
    return session()->all();
});

Route::get('/deleteSession', function () {
    session()->forget('nama');
    session()->flush();
    return "Session Sudah Dihapus";
});

Route::controller(AuthController::class)->prefix("auth")->name('auth.')->group(function () {
    Route::get("/login", "index")->name("login");
    Route::post("/login", "login")->name("process");
    Route::get("/logout", "logout")->name("logout");
});

Route::get('/dashboard', function () {
    $resume = [
        [
            'title' => "TODAY'S MONEY",
            'number' => "$53,000",
            'percentage' => "+55%",
            'increst' => true,
            'since' => "since yesterday",
            'icon' => "ni ni-money-coins",
            'icon-bg' => "bg-gradient-primary shadow-primary",
        ],
        [
            'title' => "TODAY'S USERS",
            'number' => "2,300",
            'percentage' => "+3%",
            'increst' => true,
            'since' => "since last week",
            'icon' => "ni ni-world",
            'icon-bg' => "bg-gradient-danger shadow-danger",
        ],
        [
            'title' => "NEW CLIENTS",
            'number' => "+3,462",
            'percentage' => "-2%",
            'increst' => false,
            'since' => "since last quarter",
            'icon' => "ni ni-paper-diploma",
            'icon-bg' => "bg-gradient-success shadow-success",
        ],
        [
            'title' => "SALES",
            'number' => "$103,430",
            'percentage' => "+5%",
            'increst' => true,
            'since' => "than last month",
            'icon' => "ni ni-cart",
            'icon-bg' => "bg-gradient-warning shadow-warnin",
        ],
    ];
    return view('pages.dashboard.index', [
        'resume' => $resume
    ]);
})->middleware(Authenticate::class)->name('dashboard.index');

Route::controller(UserController::class)->middleware(["authenticate:admin"])->prefix("users")->name("users.")->group(function () {
    // ->middleware(Authenticate::class)
    // ->middleware([Authenticate::class]); // beberapa middleware
    // ->middleware(["authenticate:admin"]) // alias dan kirim argumenet
    Route::get('/', "index")->name('index')->middleware(Authenticate::class);
    Route::get('/create', "create")->name('create');
    Route::get('/{id}', "show")->name('show');
    Route::get('/{id}/edit', "edit")->name('edit');
    Route::get('/{id}/active', "active")->name('active');
    Route::post('/', "store")->name('store');
    Route::put('/{id}', "update")->name('update');
    Route::delete('/{id}', "destroy")->name('destroy');
});


Route::resource('divisions', DivisionController::class)->middleware(["authenticate:admin"]);
Route::resource('members', MemberController::class)->middleware(["authenticate:admin"]);
Route::resource('meetings', MeetingController::class)->middleware(["authenticate:admin|sekretaris"]);
Route::controller(AttendanceController::class)->middleware(["authenticate:admin|sekretaris"])->prefix('meetings/attendances')->name('attendances.')->group(function () {
    Route::get('/{id}/create', "create")->name('create');
    Route::get('/{id}', "index")->name('index');
    Route::get('/{id}/edit', "edit")->name('edit');
    Route::post('/{id}', "store")->name('store');
    Route::put('/{id}', "update")->name('update');
    Route::delete('/{id}', "destroy")->name('destroy');
});

Route::controller(KasController::class)->middleware(["authenticate:admin|bendahara"])->prefix('kas')->name('kas.')->group(function () {
    Route::get('/', "index")->name('index');
    Route::get('/{id}/create', "create")->name('create');
    Route::get('/{id}', "show")->name('show');
    Route::post('/{id}', "store")->name('store');
    // Route::get('/{id}/edit', "edit")->name('edit');
    // Route::put('/{id}', "update")->name('update');
    // Route::delete('/{id}', "destroy")->name('destroy');
});
Route::resource('expenses', ExpenseController::class)->middleware(["authenticate:admin|bendahara"]);

Route::controller(ProfileController::class)->middleware(["authenticate"])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', "index")->name('index');
    Route::put('/', "update")->name('update');
    Route::put('/change-password', "update_password")->name('change_password');
});

Route::get('/transaction_history', [TransactionHistoryController::class, 'index'])->name('transaction_history.index');
