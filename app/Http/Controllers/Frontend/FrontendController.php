<?php

namespace App\Http\Controllers\Frontend;
use App\Models\{Content, Service, Setting, Tag, Post};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use DB;

class FrontendController extends Controller
{
    
    public function index()
    {

        //$last_record = Local::latest('id')->first();

        //SEO =======================================
        /*
        $seo = $this->seo->get_seo('COVID-19 seguimiento mundial',
        "https://sarstracker.com/storage/covid-19-wolrd-v2.jpg",
        'Evolución diaria de casos de COVID19 a nivel mundial',
        ""
        );
        */

        return view('frontend/cover', ['seo' => 'xxx']);
        
    }

    public function about()
    {
        $vision = Content::where('shortcut', 'about.vision')->first();
        $mision = Content::where('shortcut', 'about.mision')->first();
        $values = Content::where('shortcut', 'about.values')->first();
        $fields = Content::where('id', 10)->first();

        return view('frontend/about', ['seo' => 'xxx', 'vision' => $vision, 'mision' => $mision, 'values' => $values, 'fields' => $fields]);
        
    }

    public function services()
    {
        $services = Service::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend/services', ['seo' => 'xxx', 'services' => $services]);
        
    }

    
    public function service($slug = null)
    {
        $setting = Setting::first();
        $service = Service::where('slug', $slug)->first();
        return view('frontend/service', ['seo' => 'xxx', 'service' => $service, 'setting' => $setting]);
        
    }


    public function fields()
    {

        return view('frontend/fields', ['seo' => 'xxx']);
        
    }

    public function news()
    {

        $setting = Setting::first();

        $posts = DB::table('posts')
        ->select(DB::raw('posts.id, posts.title, posts.slug, posts.sumary, posts.img, posts.pub_date, tags.name as tag_name, tags.slug as tag_slug'))
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->where('posts.status', 1)
        ->orderBy('posts.pub_date', 'desc')
        ->limit(5)
        ->get();

        return view('frontend/news', ['seo' => 'xxx', 'posts' => $posts, 'setting' => $setting]);
        
    }

    public function tags($slug = '')
    {
        $setting = Setting::first();
        $tag = Tag::where('slug', $slug)->first();

        $posts = DB::table('posts')
        ->select(DB::raw('posts.id, posts.title, posts.slug, posts.sumary, posts.img_md, posts.pub_date, tags.name as tag_name, tags.slug as tag_slug'))
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->where('posts.status', 1)
        ->where('tags.slug', $slug)
        ->orderBy('posts.pub_date', 'desc')
        ->limit(5)
        ->get();

        return view('frontend/tags', ['seo' => 'xxx', 'posts' => $posts, 'tag' => $tag, 'setting' => $setting]);
        
    }

    public function post($slug = null)
    {

        $setting = Setting::first();

        $post = DB::table('posts')
        ->select(DB::raw('posts.id, posts.title, posts.slug, posts.content, posts.img, posts.img_md, posts.pub_date, tags.name as tag_name, tags.slug as tag_slug'))
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->where('posts.slug', $slug)
        ->first();

        return view('frontend/post', ['seo' => 'xxx', 'post' => $post, 'setting' => $setting]);
        
    }

    public function registration()
    {

        return view('frontend/registration', ['seo' => 'xxx']);
        
    }

    public function covid()
    {
        $content = Content::where('group_id', 4)->orderBy('order', 'ASC')->get();

        return view('frontend/covid', ['seo' => 'xxx', 'content' => $content]);
        
    }

    public function contact(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $text = $request->input('message');

        if($request->input()){
            $send = $this->send_contact($name, $email, $text);
            return redirect('/contact')->with('success', 'Message sent');

        }else{

            $setting = Setting::first();
            return view('frontend/contact', ['seo' => 'xxx', 'setting' => $setting]);
        }
        
    }

    public function send_contact($name = null, $email = null, $message = null)
    {
        $vars = new ContactMailable($name, $email, $message);
        Mail::to('davidchavarrig@gmail.com')->send($vars);
    }

    public function shop()
    {

        return view('frontend/shop', ['seo' => 'xxx']);
        
    }

    public function login()
    {

        return view('frontend/user-login', ['seo' => 'xxx']);
        
    }

    public function kidsleague()
    {

        return redirect('/registration/2/kids-league');
        
    }

    public function friendshipcup()
    {

        return redirect('/registration/1/friendship-cup');
        
    }

}
