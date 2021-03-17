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

        $setting = Setting::first();

        //SEO =======================================
        $seo = ['title' => $setting->site_name, 
                'sumary' => $setting->site_name, 
                'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
                ];

        return view('frontend/cover', ['seo' => $seo]);
        
    }

    public function about()
    {
        $intro = Content::where('shortcut', 'about.intro')->first();
        $vision = Content::where('shortcut', 'about.vision')->first();
        $mision = Content::where('shortcut', 'about.mision')->first();
        $values = Content::where('shortcut', 'about.values')->first();
        $fields = Content::where('id', 10)->first();

        $seo = ['title' => 'About | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/about', ['seo' => $seo, 'vision' => $vision, 'mision' => $mision, 'values' => $values, 'fields' => $fields, 'intro' => $intro]);
        
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

        $seo = ['title' => 'News | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/news', ['seo' => $seo, 'posts' => $posts]);
        
    }

    public function tags($slug = '')
    {
        $setting = Setting::first();
        $tag = Tag::where('slug', $slug)->first();

        $posts = DB::table('posts')
        ->select(DB::raw('posts.id, posts.title, posts.slug, posts.sumary, posts.img, posts.pub_date, tags.name as tag_name, tags.slug as tag_slug'))
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->where('posts.status', 1)
        ->where('tags.slug', $slug)
        ->orderBy('posts.pub_date', 'desc')
        ->limit(5)
        ->get();

        $seo = ['title' => $tag->name.' | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/tags', ['seo' => $seo, 'posts' => $posts, 'tag' => $tag]);
        
    }

    public function post($slug = null)
    {

        $setting = Setting::first();

        $post = DB::table('posts')
        ->select(DB::raw('posts.id, posts.title, posts.sumary, posts.slug, posts.content, posts.img, posts.img_md, posts.pub_date, tags.name as tag_name, tags.slug as tag_slug'))
        ->leftJoin('tags', 'posts.tag_id', '=', 'tags.id')
        ->where('posts.slug', $slug)
        ->first();

        $seo = ['title' => $post->title.' | KISC, Sports complex', 
        'sumary' => $post->sumary, 
        'image' => $post->img
        ];

        return view('frontend/post', ['seo' => $seo, 'post' => $post]);
        
    }

    public function covid()
    {
        $content = Content::where('group_id', 4)->orderBy('order', 'ASC')->get();

        $seo = ['title' => 'Covid-19 Protocols | KISC, Sports complex', 
        'sumary' => '', 
        'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
        ];

        return view('frontend/covid', ['seo' => $seo, 'content' => $content]);
        
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

            $seo = ['title' => 'Contact | KISC, Sports complex', 
            'sumary' => '', 
            'image' => 'https://katyisc.com/storage/files/katyisc-sports-complex-share.webp'
            ];

            return view('frontend/contact', ['seo' => $seo]);
        }
        
    }

    public function send_contact($name = null, $email = null, $message = null)
    {
        $vars = new ContactMailable($name, $email, $message);
        Mail::to('info@katyisc.com')->send($vars);
    }

    public function shop()
    {

        return view('frontend/shop', ['seo' => 'xxx']);
        
    }

    public function kidsleague()
    {

        return redirect('/leagues/kids-league');
        
    }

    public function friendshipcup()
    {

        return redirect('/tournaments/friendship-cup');
        
    }

    public function test()
    {

        $seo = ['title' => 'Test | KISC, Sports complex', 
        'sumary' => '', 
        'image' => ''
        ];
        return view('frontend/test', ['seo' => $seo]);

        
    }

}
