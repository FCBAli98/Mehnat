<?php

namespace App\Http\Controllers;

use App\Dictionary;
use Illuminate\Http\Request;
use App\Repositories\PagesRepository;

class PagesController extends Controller
{

	protected $repo;
    public function __construct(PagesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($name)
    {
        if($name == 'mehnat-munosabatlari-alifbosi' || $name == 'azbuka-trudovyh-otnosheniy'){
            $dictionaries = Dictionary::where('status', true)->where('lang', \App::getLocale())->get();
            switch (\App::getLocale()){
                case 'oz':
                    $lang = 'Mehnat va bandlik sohasiga oid atamalarning izohli lug\'ati';
                    break;
                case 'uz':
                    $lang = 'Меҳнат ва бандлик соҳасига оид атамаларнинг изоҳли луғати';
                    break;
                case 'en':
                    $lang = 'Glossary of terms related to labor and employment';
                    break;
                case 'ru':
                    $lang = 'Глоссарий терминов, связанных с трудом и занятостью';
                    break;
            }
            return view('pages.dictionary', compact('dictionaries', 'lang'));
        } else{
            $model = $this->repo->findByNameArticle($name);
            $menu = $this->repo->getRelationMenu($model->relation_menu_id);
            $data = [
                'model' => $model,
                'menu' => $menu,
            ];
            return view('pages.show', $data);
        }
    }
    
    public function showMobile($name)
    {
        if($name == 'mehnat-munosabatlari-alifbosi' || $name == 'azbuka-trudovyh-otnosheniy'){
            $dictionaries = Dictionary::where('status', true)->where('lang', \App::getLocale())->get();
            switch (\App::getLocale()){
                case 'oz':
                    $lang = 'Mehnat va bandlik sohasiga oid atamalarning izohli lug\'ati';
                    break;
                case 'uz':
                    $lang = 'Меҳнат ва бандлик соҳасига оид атамаларнинг изоҳли луғати';
                    break;
                case 'en':
                    $lang = 'Glossary of terms related to labor and employment';
                    break;
                case 'ru':
                    $lang = 'Глоссарий терминов, связанных с трудом и занятостью';
                    break;
            }
            return view('pages.dictionary', compact('dictionaries', 'lang'));
        } else{
            $model = $this->repo->findByNameArticle($name);
            $menu = $this->repo->getRelationMenu($model->relation_menu_id);
            $data = [
                'model' => $model,
                'menu' => $menu,
            ];

            return view('pages.show-mobile', $data);
        }
    }

}
