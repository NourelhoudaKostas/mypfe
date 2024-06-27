<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\PlaylisteController;
use App\Http\Controllers\AutheficationController;
use App\Http\Controllers\Welcom_To_ENSET_Controller;

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

Route::get('/', [Welcom_To_ENSET_Controller::class, 'index'])->name('homepage');
Route::get('/about', [Welcom_To_ENSET_Controller::class, 'about'])->name('about');

Route::get('/Dashboard', [Welcom_To_ENSET_Controller::class, 'about'])->name('Dashboard');
Route::get('/contact', [Welcom_To_ENSET_Controller::class, 'contact'])->name('contact');
Route::get('/signup', [Welcom_To_ENSET_Controller::class, 'signup'])->name('signup');


Route::get('/Stor', [Welcom_To_ENSET_Controller::class, 'Store_index'])->name('Storepage');
Route::get('/Diplôme', [Welcom_To_ENSET_Controller::class, 'Diplôme'])->name('Diplôme');

Route::group(['namespace' => 'AutheficationController'], function () {
   Route::get('/login', [AutheficationController::class, 'login_view'])->name('login');
   Route::get('/logout', [AutheficationController::class, 'logout'])->name('logout');

   Route::post('/loginaction', [AutheficationController::class, 'login_action'])->name('login_action');
   Route::get('/register', [AutheficationController::class, 'Registration_view'])->name('register');
   Route::post('/registeraction', [AutheficationController::class, 'Registration_action'])->name('register_action');
   Route::get('/ForGetpassword', [AutheficationController::class, 'forgetpasword_view'])->name('ForGetpassword');
   Route::post('/ForGetpasswordaction', [AutheficationController::class, 'forgetpasword_action'])->name('forget_action');
});

//Route::get('/back',function(){ return view('authentification.messagebackpassword');});
//admin
Route::get('/Admin/dashbord', [AdminController::class, 'dashbord_view'])->name('dashbord_admin');
//profile
Route::get('/Admin/profile', [AdminController::class, 'profile_admin'])->name('profile_admin');

// Route::get('/Admin/profile', [AdminController::class, 'profile_admin'])->name('profile_admin');
Route::get('/Admin/formateurs', [AdminController::class, 'formateurs_view'])->name('formateurs.view');
Route::get('/Admin/admin', [AdminController::class, 'admin_view'])->name('admin.view');

Route::get('/Admin/students', [AdminController::class, 'student_view'])->name('student.view');
Route::get('/Admin/students/search', [AdminController::class, 'search'])->name('student.search');
Route::get('/Admin/students/activation', [AdminController::class, 'student_activation'])->name('student.activation');
Route::post('/Admin/students/activation/action/{id}', [AdminController::class, 'student_activation_action'])->name('student.activation.action');
Route::post('/Admin/addstudent', [AdminController::class, 'student_add'])->name('addstudent');

Route::post('/Admin/formateuradd', [AdminController::class, 'formateur_add'])->name('addformateur');
// Route::get('/Admin/formateurs/edit', [AdminController::class, 'formateurs_edit'])->name('formateurs.edit');
Route::post('/Admin/formateurs/update/{id}', [AdminController::class, 'formateur_update'])->name('updateformateur');

Route::post('/Admin/formateurs/delete', [AdminController::class, 'formateur_delete'])->name('deleteformateur');
Route::post('/Admin/students/update/{id}', [AdminController::class, 'student_update'])->name('updatestudent');

Route::post('/Admin/students/delete', [AdminController::class, 'formateur_delete'])->name('deletestudent');




//admin profile 
Route::get('/admin/profile', 'ProfileController@show')->name('admin.profile');


//formateur
Route::get('/Formateur/dashbord', [FormateurController::class, 'Formateur_view'])->name('dashbord_formateur');
Route::get('/Formateur/profile', [FormateurController::class, 'profile_Formateur'])->name('profile_formateur');
Route::get('/Formateur/cours/creation', [CourseController::class, 'cours_creation'])->name('cours.creation');



//users or student 
Route::get('/Student/dashbord', [StudentController::class, 'Student_view'])->name('dashbord_student');
// Route::get('/Student/profile', [StudentController::class, 'profile_Student'])->name('profile_student');
Route::post('/register', [StudentController::class,'register'])->name('auth.register');



//courses
Route::get('/course/view', [CourseController::class, 'index'])->name('course.view');
Route::get('/course/lire/{id}', [CourseController::class, 'lirecourse'])->name('course.lire');
Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('/course/create/store', [CourseController::class, 'store'])->name('course.create.store');
Route::get('/delete_course/{id}', [CourseController::class, 'destroy'])->name('delete_course');


Route::get('/playlistes/create', [PlaylisteController::class, 'create'])->name('playlistes.create');
Route::post('/playlistes/create/store', [PlaylisteController::class, 'store'])->name('playlistes.create.store');
Route::get('/playlistes/delete_playlist/{id}', [PlaylisteController::class, 'destroy'])->name('delete_playlist');

Route::get('/Question/view', [QuestionController::class, 'index'])->name('Question.view');
Route::post('/Question/create/store', [QuestionController::class, 'store'])->name('Question.create.store');
Route::get('/Question/delete_Question/{id}', [QuestionController::class, 'destroy'])->name('delete_Question');


Route::POST('/Question/Test', [TestController::class, 'store'])->name('tests.store');



//contact
Route::post('/contactUs', [contactController::class,'contact'])->name('contactus');

