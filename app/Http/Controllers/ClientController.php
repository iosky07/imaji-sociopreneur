<?php

namespace App\Http\Controllers;


use App\Models\Blog;

//use App\Models\BlogComment;
use App\Models\Campaign;
use App\Models\Contact;

//use App\Models\Event;
use App\Models\Content;
use App\Models\Faq;
use App\Models\Gallery;

//use App\Models\Home;
use App\Models\Partner;

//use App\Models\Project;
//use App\Models\Slider;
use App\Models\Sosmed;
use App\Models\Team;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class ClientController extends Controller
{
    public function index($locale)
    {
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        $sliders = Campaign::orderBy('id', 'DESC')->whereTypeCampaignId(2)->limit(5)->get(['slug', 'title_' . $locale, 'thumbnail']);
        $blogs = Content::orderBy('id', 'DESC')->whereTypeContentId(1)->whereStatusId(2)->where('created_at', '<=', Carbon::now())->limit(3)->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail']);
        $events = Content::orderBy('id', 'DESC')->whereTypeContentId(2)->whereStatusId(2)->where('created_at', '<=', Carbon::now())->limit(3)->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'date_event']);
        $projects = Content::orderBy('id', 'DESC')->whereTypeContentId(3)->whereStatusId(2)->where('created_at', '<=', Carbon::now())->limit(3)->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail']);
        $faqs = Faq::orderBy('id', 'DESC')->limit(3)->get(['title_' . $locale]);
        $partnersB = Partner::whereSizeLogoId(1)->get();
        $galleries = Gallery::all();
        $partnersA = Partner::whereSizeLogoId(0)->get();
        $sosmeds = Sosmed::limit(3)->orderByDesc('created_at')->get();
        return view('user.home', compact('testimonials', 'blogs', 'sliders', 'projects', 'events', 'faqs', 'partnersA', 'partnersB', 'galleries', 'sosmeds'));
    }

    public function show($locale, $slug)
    {
        $content = Content::where('slug_id', '=', $slug)->orWhere('slug_en', '=', $slug)->firstOrFail();
        $content->view = $content->view + 1;
        Content::find($content->id)->update(['view' => $content->view]);
        $prev = Content::find($content->id - 1);
        $next = Content::find($content->id + 1);
        return view('user.blog-show', compact('content', 'prev', 'next', 'locale'));
    }

    public function contact(Request $request)
    {
        Contact::create($request->all());
        return redirect(route('index'));
    }

    public function imajiAcademy($locale)
    {
        return view('user.imaji-academy', compact('locale'));
    }

    public function faq($locale)
    {
        $faqs = Faq::all();
        return view('user.faq', compact('faqs', 'locale'));
    }

    public function pkps($locale)
    {
        return view('user.pkps', compact('locale'));
    }

    public function imajiSociopreneur($locale)
    {
        $teams = Team::all();
        $achieves = Campaign::orderBy('id', 'DESC')->whereTypeCampaignId(2)->get(['slug', 'title_' . $locale, 'thumbnail']);
        return view('user.imaji-sociopreneur', compact('teams', 'achieves', 'locale'));
    }

    public function kampoengRecycle()
    {
        return view('user.kampoeng-recycle');
    }

    public function search($locale,Request $request)
    {
//        dd('a');
        $search = $request->search;
        $blogs = Content::orderBy('id', 'DESC')->where('created_at', '<=', Carbon::now())->whereTypeContentId(1)->whereStatusId(2)->where('title_' . $locale, 'like', '%' . $search . '%')->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'created_at']);
        $events = Content::orderBy('id', 'DESC')->where('created_at', '<=', Carbon::now())->whereTypeContentId(2)->where('title_' . $locale, 'like', '%' . $search . '%')->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'date_event']);
        $projects = Content::orderBy('id', 'DESC')->where('created_at', '<=', Carbon::now())->whereTypeContentId(3)->where('title_' . $locale, 'like', '%' . $search . '%')->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'created_at']);
//        dd($blogs);
        return view('user.search-index', compact('blogs', 'projects', 'events'));
    }

    public function blogComment(Request $request)
    {

        BlogComment::create($request->all());
        return redirect(route('blog.show', $request->slug));
    }

    public function eventIndex($locale)
    {
        $events = Content::orderBy('id', 'DESC')->where('created_at', '<=', Carbon::now())->whereTypeContentId(2)->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'date_event']);
        return view('user.event-index', compact('events', 'locale'));
    }

//    public function eventIndex($locale)
//    {
//        $events = Content::orderBy('id', 'DESC')->whereTypeContentId(2)->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'date_event']);
//        return view('user.event-index', compact('events', 'locale'));
//    }
//
//    public function eventShow($locale, $slug)
//    {
//        $event = Content::where('slug_'.$locale, '=', $slug)->whereTypeContentId(2)->firstOrFail();
//        return view('user.event-show', compact('event', 'locale'));
//    }
//
    public function projectIndex($locale)
    {
        $projects = Content::orderBy('id', 'DESC')->where('created_at', '<=', Carbon::now())->whereTypeContentId(3)->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'created_at']);
        return view('user.project-index', compact('projects', 'locale'));
    }
//
//    public function projectShow($locale, $slug)
//    {
//        $project = Content::where('slug', '=', $slug)->whereTypeContentId(3)->firstOrFail();
//        return view('user.project-show', compact('project'));
//    }
    public function blogIndex($locale)
    {
        $blogs = Content::orderBy('id', 'DESC')->where('created_at', '<=', Carbon::now())->whereTypeContentId(1)->whereStatusId(2)->get(['slug_' . $locale, 'title_' . $locale, 'thumbnail', 'created_at']);
        return view('user.blog-index', compact('blogs', 'locale'));
    }
//
//    public function blogShow($locale, $slug)
//    {
//        $blog = Content::where('slug_'.$locale, '=', $slug)->whereTypeContentId(1)->whereStatus(1)->firstOrFail();
//        $blog->view = $blog->view + 1;
//        Content::find($blog->id)->update(['view' => $blog->view]);
//        $prev = Content::find($blog->id - 1);
//        $next = Content::find($blog->id + 1);
//        return view('user.blog-show', compact('blog', 'prev', 'next', 'locale'));
//    }


}
