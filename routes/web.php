<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DirectorsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageFromController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialitiesController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Models\Services;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//! :: Web Routes
Route::post('/login',function(Request $request){
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = App\Models\User::where('email',$request->email)->first();  
        if($user != null){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('is_logged_in',true);
                $request->session()->put('role',$user->role);
                $request->session()->put('id',$user->id);
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back();
            }
        }else{
                return redirect()->back();
        }      
});
// Route::get('hhh',function(){
//   Artisan::call("cache:clear"); 
// });
Auth::routes();


Route::get('/emailCheck', [HomeController::class, 'emailCheck'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index']);


// About
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('services', [FrontendController::class, 'service'])->name('services');
Route::get('services/{title}', [FrontendController::class, 'serviceDetail'])->name('service-detail');

// News
Route::get('news', [FrontendController::class, 'news'])->name('news-event');
Route::get('/news/{id}', [FrontendController::class, 'newsDetail'])->name('news-detail');


// Sepcialitiees
Route::get('specialities', [FrontendController::class, 'specialities'])->name('specialities');
Route::get('/specialities/{id}', [FrontendController::class, 'specialitiesDetail'])->name('specialities-detail');



// Doctor Route
Route::get('doctors', [FrontendController::class, 'doctors'])->name('doctors');
Route::get('/doctors/{id}', [FrontendController::class, 'doctorsDetail'])->name('doctors-detail');

// Appointment
Route::get('/appointment', [FrontendController::class, 'appointment'])->name('appointment');
Route::post('/appointment-submit', [FrontendController::class, 'appointment_submit'])->name('appointment-submit');


// Publication
Route::get('publication', [FrontendController::class, 'publication'])->name('publication');
Route::get('publication/{id}', [FrontendController::class, 'publicationDetail'])->name('publication-detail');


// Contact Us
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contactEmail', [FrontendController::class, 'contactEmail'])->name('contact-us');
Route::get('/careers', [FrontendController::class, 'careers'])->name('careers');
Route::post('/careers', [FrontendController::class, 'cvcreate'])->name('add-cv');

Route::get('career/{id}', [FrontendController::class, 'careerDetail'])->name('career-detail');

Route::post('career', [FrontendController::class, 'job_apply'])->name('job-apply');




Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/subgallery/{id}', [FrontendController::class, 'subGallery'])->name('sub-gallery');


Route::prefix('admin')->middleware(['isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('logout',[HomeController::class,'logout'])->name('logout');
    // About Info
    // slider
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('add-slider');
    Route::post('/slider/create', [SliderController::class, 'store'])->name('add-slider');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('edit-slider');
    Route::put('/slider/edit/{id}', [SliderController::class, 'update'])->name('update-slider');
    // Route::put('/slider/edit/{id}',[SliderController::class, 'update'])->name('update-slider');
    Route::delete('/slider/delete/{id}', [SliderController::class, 'delete'])->name('delete-slider');

    // Services
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('add-service');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('add-service');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('edit-service');
    Route::put('/service/edit/{id}', [ServiceController::class, 'update'])->name('update-service');
    Route::delete('/service/delete/{id}', [ServiceController::class, 'delete'])->name('delete-service');
    
    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('add-category');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('add-category');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::put('/category/edit/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete-category');

    // Specialities

    Route::get('/specialities', [SpecialitiesController::class, 'index'])->name('specialities');
    Route::get('/specialities/create', [SpecialitiesController::class, 'create'])->name('add-specialities');
    Route::post('/specialities/create', [SpecialitiesController::class, 'store'])->name('add-specialities');
    Route::get('/specialities/edit/{id}', [SpecialitiesController::class, 'edit'])->name('edit-specialities');
    Route::put('/specialities/edit/{id}', [SpecialitiesController::class, 'update'])->name('update-specialities');
    Route::delete('/specialities/delete/{id}', [SpecialitiesController::class, 'delete'])->name('delete-specialities');

    // News Section
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/create', [NewsController::class, 'create'])->name('add-news');
    Route::post('/news/create', [NewsController::class, 'store'])->name('add-news');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('edit-news');
    Route::put('/news/edit/{id}', [NewsController::class, 'update'])->name('update-news');
    Route::delete('/news/delete/{id}', [NewsController::class, 'delete'])->name('delete-news');

    // Testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('add-testimonial');
    Route::post('/testimonial/create', [TestimonialController::class, 'store'])->name('add-testimonial');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('edit-testimonial');
    Route::put('/testimonial/edit/{id}', [TestimonialController::class, 'update'])->name('update-testimonial');
    Route::delete('/testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('delete-testimonial');


    // Director
    Route::get('/director', [DirectorsController::class, 'index'])->name('director');
    Route::get('/director/create', [DirectorsController::class, 'create'])->name('add-director');
    Route::post('/director/create', [DirectorsController::class, 'store'])->name('add-director');
    Route::get('/director/edit/{id}', [DirectorsController::class, 'edit'])->name('edit-director');
    Route::put('/director/edit/{id}', [DirectorsController::class, 'update'])->name('update-director');
    Route::delete('/director/delete/{id}', [DirectorsController::class, 'delete'])->name('delete-director');

    // Team Member
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::get('/team/create', [TeamController::class, 'create'])->name('add-team');
    Route::post('/team/create', [TeamController::class, 'store'])->name('add-team');
    Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('edit-team');
    Route::put('/team/edit/{id}', [TeamController::class, 'update'])->name('update-team');
    Route::delete('/team/delete/{id}', [TeamController::class, 'delete'])->name('delete-team');

    // Doctors
    Route::get('/doctor', [DoctorsController::class, 'index'])->name('doctor');
    Route::get('/doctor/create', [DoctorsController::class, 'create'])->name('add-doctor');
    Route::post('/doctor/create', [DoctorsController::class, 'store'])->name('add-doctor');
    Route::get('/doctor/edit/{id}', [DoctorsController::class, 'edit'])->name('edit-doctor');
    Route::put('/doctor/edit/{id}', [DoctorsController::class, 'update'])->name('update-doctor');
    Route::delete('/doctor/delete/{id}', [DoctorsController::class, 'delete'])->name('delete-doctor');

    // Career 
    Route::get('/career', [CareerController::class, 'index'])->name('career');
    Route::get('/career/create', [CareerController::class, 'create'])->name('add-career');
    Route::post('/career/create', [CareerController::class, 'store'])->name('add-career');
    Route::get('/career/edit/{id}', [CareerController::class, 'edit'])->name('edit-career');
    Route::put('/career/edit/{id}', [CareerController::class, 'update'])->name('update-career');
    Route::delete('/career/delete/{id}', [CareerController::class, 'delete'])->name('delete-career');
    
    Route::get('/viewcv', [CareerController::class, 'viewcv'])->name('view-cv');
      Route::get('/allcv', [CareerController::class, 'allcv'])->name('all-cv');
    
    //position
    Route::resource('position', PositionController::class);



    // Message from 
    Route::get('/message', [MessageController::class, 'index'])->name('message');
    Route::get('/message/edit/{id}', [MessageController::class, 'edit'])->name('edit-message');
    Route::post('/message/edit', [MessageController::class, 'update'])->name('edit-message');

    // About
    Route::get('/about',[AboutController::class,'index'])->name('about');
    Route::get('/about/edit/{id}',[AboutController::class,'edit'])->name('edit-about');
    Route::put('/about/edit/{id}',[AboutController::class,'update'])->name('edit-aboutus');

    // Publication
    Route::get('/publication', [PublicationController::class, 'index'])->name('publication');
    Route::get('/publication/create', [PublicationController::class, 'create'])->name('add-publication');
    Route::post('/publication/create', [PublicationController::class, 'store'])->name('add-publication');
    Route::get('/publication/edit/{id}', [PublicationController::class, 'edit'])->name('edit-publication');
    Route::put('/publication/edit/{id}', [PublicationController::class, 'update'])->name('update-publication');
    Route::get('/publication/delete/{id}', [PublicationController::class, 'delete'])->name('delete-publication');
    
    // Gallery
    Route::get('/show-gallery', [ProgramController::class, 'index'])->name('show-gallery');
    Route::get('/gallery/create', [ProgramController::class, 'create'])->name('add-gallery');
    Route::post('/gallery/create', [ProgramController::class, 'store'])->name('add-gallery');
    Route::get('/gallery/edit/{id}', [ProgramController::class, 'edit'])->name('edit-gallery');
    Route::put('/gallery/edit/{id}', [ProgramController::class, 'update'])->name('update-gallery');
    Route::get('/gallery/delete/{program}', [ProgramController::class, 'delete'])->name('delete-gallery');

    
});