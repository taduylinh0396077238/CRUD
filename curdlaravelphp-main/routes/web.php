<?php

use App\newtable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('home', [HomeController::class,"showWelcome"]);

//Route localhost/hellolaravel/public/
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

//Tạo một route mới, file details là file con của public
Route::get('/about', function(){
    return view('about');
});

//Tạo một route mới, file details là file con của public
Route::get('/blog', function(){
    return view('blog');
});

//Tạo một route mới, file details là file con của public
Route::get('/contact', function(){
    return view('contact');
});

//Tạo một route mới, file details là file con của public
Route::get('/course', function(){
    return view('course');
});

Route::get('/teacher', function(){
    return view('teacher');
});

//Cách gọi khác thay vì route::get
Route::get('submit-form', function(){
    return "Anythings";
});

//Sử dụng route với tham số
Route::get('/details/{theSubject}', function ($theSubject){
    return $theSubject . " is a good person!"; //Thay đổi đường dẫn bằng giá trị truyền vào cho tham số, ví dụ /details/khanh/
});

//Ủy quyền với route
Route::get('/details', function (){
    return Redirect::to('submit-form'); //Đường dẫn bên trong redirect to sẽ thay thế cho đường dẫn nằm trong get
});

//Insert dữ liệu
Route::get('/insert', function (){
   DB::insert('insert into newtable(title, description, price) values(?, ?, ?)', ["PHP with Laravel", "Laravel is he best framework!", 10]);
   return 'Done';
});

Route::get('/select', function (){
   $result = DB::select('select * from newtable where id = ?', [1]);
   foreach ($result as $post){
       return $post -> title;
   }
});

Route::get('/update', function (){
    DB::update('update newtable set title = "Kimetsu no Yaiba" where id = ?', [1]);
    echo "Update successful!";
});

Route::get('/delete', function (){
    DB::delete('delete from newtable where id = ?', [1]);
    echo "Delete successful!";
});

Route::get('/readAll', function (){
   $post = newtable::all();
   foreach ($post as $s){
       echo $s -> title;
       echo "<br>";
   }
});

Route::get('/findId', function (){
    $post = newtable::where('id', 2)
    ->orderBy('id')
        ->take(10)
    ->get();
    foreach ($post as $s){
        echo $s -> title;
        echo "<br>";
    }
});
