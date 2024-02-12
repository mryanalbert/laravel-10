<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    // Fetch all users
    // $users = DB::select('select * from users');
    // $users = DB::table('users')->where('email', 'mryanalbert@gmail.com')->get();
    $users = User::get();

    // create new user
    // $user = DB::insert('insert into users (name, email, password) values (?, ?, ?)', [
    //     'John',
    //     'j@gmail.com',
    //     'john'
    // ]);
    // $user = DB::table('users')->insert([
    //     'name' => "John1",
    //     'email' => 'r@g.co',
    //     'password' => bcrypt('password')
    // ]);
    // $user = User::create([
    //     'name' => 'Edison',
    //     'email' => 'son@g.co',
    //     'password' => bcrypt('pass')
    // ]);

    // update user
    // $user = DB::update('update users set email = ? where id = ?', [
    //     'mryanalbert@gmail.com',
    //     1
    // ]);
    // $user = DB::table('users')
        // ->where('id', 7)
        // ->update(['email' => 'xyz@gmail.co']);
    // $user = User::where('id', 8)->update([
    //     'email' => 't@g.co'
    // ]);

    // delete a user
    // $user = DB::delete('delete from users where id = ?', [4]);
    // $user = DB::table('users')->where('id', 7)->delete();
    // $user = User::where('id', 8)->delete();
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
