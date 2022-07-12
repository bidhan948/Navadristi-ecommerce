<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Allcv;
use App\Models\Career;
use App\Models\Category;
use App\Models\Directors;
use App\Models\Doctors;
use App\Models\HomeSlider;
use App\Models\MailInfo;
use App\Models\Message;
use App\Models\News;
use App\Models\Program;
use App\Models\Publication;
use App\Models\Services;
use App\Models\Specialities;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Resume;
use App\Models\Visitor;
use App\Models\Contact;
use App\Models\position;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller
{
    public function index()
    {

        if (Visitor::query()->where('ip', request()->ip())->count() == 0) {
            visitor::create(['ip' => request()->ip()]);
        }

        $slider = HomeSlider::query()->get();
        $about = About::query()->get();
        $service = Services::query()->get();
        $testimonial = Testimonial::query()->get();
        $specialities = Specialities::query()->get();
        $message = Message::query()->get();
        $news = News::orderBy('created_at', 'DESC')->get();

        return view('frontend.index', ['slider' => $slider, 'service' => $service, 'news' => $news, 'testimonial' => $testimonial, 'specialities' => $specialities, 'message' => $message, 'about' => $about]);
    }
    //News  
    public function news()
    {
        $news = News::query()->orderBy('created_at', 'DESC')->paginate(6);
        $about = About::query()->get();
        return view('frontend.news', ['news' => $news, 'about' => $about]);
    }
    public function newsDetail($id)
    {
        $news = News::query()->where('id', $id)->first();
        $about = About::query()->get();
        return view('frontend.news-detail', ['news' => $news, 'about' => $about]);
    }

    public function about()
    {
        // $news=News::query()->get();
        $board = Directors::query()->get();
        $about = About::query()->get();
        $team = Team::query()->get();
        $about = About::query()->get();
        return view('frontend.about', ['board' => $board, 'team' => $team, 'about' => $about]);
    }
    // Our Team 

    public function team(){
        // $news=News::query()->get();
        $board = Directors::query()->get();
        $about = About::query()->get();
        $team = Team::query()->get();
        $about = About::query()->get();
        return view('frontend.our-team', ['board' => $board, 'team' => $team, 'about' => $about]);
    }

    // Specialities 
    public function specialities()
    {
        $specialities = Specialities::query()->get();
        $about = About::query()->get();
        // dd($specialities);
        return view('frontend.specialities', ['specialities' => $specialities, 'about' => $about]);
    }
    public function specialitiesDetail($id)
    {
        $specialities = Specialities::query()->where('id', $id)->first();
        $about = About::query()->get();
        return view('frontend.specialities-detail', ['specialities' => $specialities, 'about' => $about]);
    }
    // Doctors 
    public function doctors()
    {
        $doctors = Doctors::query()->get();
        $about = About::query()->get();
        return view('frontend.doctors', ['news' => $doctors, 'about' => $about]);
    }

    public function doctorsDetail($id)
    {
        $doctors = Doctors::query()->where('id', $id)->first();
        $about = About::query()->get();
        return view('frontend.doctors-detail', ['doctors' => $doctors, 'about' => $about]);
    }

    public function service()
    {
        $service = Services::query()->get();
        $category = Category::query()->with('services')->get();
        $about = About::query()->get();
        return view('frontend.services', ['service' => $service, 'about' => $about, 'category' => $category]);
    }

    public function serviceDetail($title)
    {
        $service = Services::query()->where('title', $title)->with('categories')->first();
        $category = Category::query()->with('services')->get();
        $about = About::query()->get();
        // dd($service);
        return view('frontend.service-detail', ['service' => $service, 'about' => $about, 'category' => $category]);
    }

    // Appointment
    public function appointment()
    {
        $about = About::query()->get();
        return view('frontend.appointment', ['about' => $about]);
    }
    
    public function appointment_submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'number' => 'required',
            'state' => 'required',
            'city' => 'required'
        ]);
        
        $email = MailInfo::first();
        try {

            Mail::to($email->email)->send(new ContactMail($data));
        } catch (Exception $ex) {
            // // Debug via $ex->getMessage();
            // if (Mail::failures()) {
            //     return response()->Fail('Sorry! Please try again latter');
            // } else {
            //     // return response()->success('Great! Successfully send in your mail');
            // }
        }
        return redirect()->back();
    }


    // Careers
    public function careers()
    {
        $career = Career::query()->with('position')->latest()->get();
        
        $position = position::query()->with('career')->get();
        // dd()
        $about = About::query()->get();
        // $about = About::query()->get();


        return view('frontend.careers', ['career' => $career, 'about' => $about, 'position' => $position]);
    }
    public function careerDetail($id)
    {
        $career = Career::query()->where('id', $id)->with('position')->first();
        $about = About::query()->get();
        $position = position::query()->with('career')->get();

        return view('frontend.career-detail', ['career' => $career, 'about' => $about, 'position' => $position]);
    }

    // Appointment
    public function gallery()
    {
        $gallery = Program::query()->with('programPhotos')->get();
        $about = About::query()->get();

        return view('frontend.gallery', ['gallery' => $gallery, 'about' => $about]);
    }

    public function subGallery($id)
    {
        $gallery = Program::query()->where('id', $id)->with('programPhotos')->first();
        $about = About::query()->get();

        return view('frontend.sub-gallery', ['gallery' => $gallery, 'about' => $about]);
    }
    // Publication
    public function publication()
    {
        $publication = Publication::query()->get();
        $about = About::query()->get();
        return view('frontend.publication', ['publication' => $publication, 'about' => $about]);
    }
    public function publicationDetail($id)
    {
        $publication = Publication::query()->where('id', $id)->first();
        $about = About::query()->get();
        return view('frontend.publication-detail', ['publication' => $publication, 'about' => $about]);
    }

    // Contact 
    public function contact()
    {
        $about = About::query()->get();
        return view('frontend.contact', ['about' => $about]);
    }

    public function contactEmail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'city' => 'required',
            'message' => 'required',
        ]);
        // dd($request->message);
        Contact::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'message' => $request->message,
            'city' => $request->city,
        ]);
        // dd($data['email']);
        $email = MailInfo::first();
        try {

            Mail::to($email->email)->send(new ContactMail($data));


            return redirect()->back();
        } catch (Exception $ex) {

            // Debug via $ex->getMessage();
            if (Mail::failures()) {
                return response()->Fail('Sorry! Please try again latter');
            } else {
                // return response()->success('Great! Successfully send in your mail');
            }
        }
        return redirect()->back();
    }

   public function cvcreate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:120',
            'phone' => 'required|min:11|numeric',
            'email' => 'required|email|unique:resumes',
            'position' => 'required',
            'cv' => 'required|mimes:doc,docx,pdf|max:2048',
        ]);


        $allcv = new Allcv();

        $allcv->name = $request->input('name');
        $allcv->phone = $request->input('phone');
        $allcv->email = $request->input('email');
        $allcv->position_id = $request->input('position');

        if ($request->hasfile('cv')) {
            $file = $request->file('cv');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/cv/', $filename);
            $allcv->cv = $filename;
        }
        $allcv->save();
        return redirect()->back()->with('status', ' Send Successfully');
    }



    public function job_apply(Request $request)
    {
        $request->validate([
            'name' => 'required|max:120',
            'phone_no' => 'required|min:11|numeric',
            'email' => 'required|email|unique:resumes',
            'cv' => 'required|mimes:doc,docx,pdf|max:2048',
        ]);
        $resume = new Resume();
        // dd($request);
        $resume->name = $request->input('name');
        $resume->mobile_no = $request->input('phone_no');
        $resume->email = $request->input('email');
        $resume->position_id = $request->input('position_id');
        $resume->created_at = now();

        if ($request->hasfile('cv')) {
            $file = $request->file('cv');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('public/uploads/cv/', $filename);
            $resume->cv = $filename;
        }
        $resume->save();
        return redirect()->back()->with('status', ' Add Successfully');
    }
}
