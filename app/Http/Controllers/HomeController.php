<?php

namespace App\Http\Controllers;

use App\Region;
use App\Repositories\ArticlesRepository;
use App\Repositories\NewsRepository;
use App\Repositories\StatisticRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Repositories\HomeRepository;
use App\Repositories\TerritorialDivisionsRepository;
use App\Mail\ErrorText;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\City;

class HomeController extends Controller
{

	protected $repo;
	protected $mapRepo;
    protected $articlesRepository;
    protected $newsRepository;
    protected $statisticRepository;

    public function __construct(HomeRepository $repo, TerritorialDivisionsRepository $mapRepo, ArticlesRepository $articlesRepository, NewsRepository $newsRepository, StatisticRepository $statisticRepository)
    {
        $this->repo = $repo;
        $this->mapRepo = $mapRepo;
        $this->articlesRepository = $articlesRepository;
        $this->newsRepository = $newsRepository;
        $this->statisticRepository = $statisticRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locale = App::getLocale();

        if ($locale == 'ru') {
            $months = 'январь-декабрь';
        }elseif ($locale == 'en') {
            $months = 'january-december';
        }elseif ($locale == 'oz') {
            $months = 'yanvar-dekabr';
        }else {
            $months = 'январ-декабр';
        }
        $mapdata = $this->mapData();
        $statistics = $this->statisticRepository->getDiagramValues();
        $stat = $this->statisticRepository->getStat();
    	$data = [
            'mainSlider' => $this->repo->getMainSlider(),
    		'onlineServices' => $this->repo->getOnlineServices(),
            'informationServices' => $this->repo->getInformationServices(),
            'linksSlider' => $this->repo->getLinksSlider(),
            'news' => $this->repo->getNews(),
            'modalPageMenu' => $this->repo->getModalPageMenu(),
            'infographics' => $this->repo->getInfographics(),
            'partners' => $this->repo->getPartners(),
            'mapData' => $mapdata,
            'leftMenu' => $this->repo->getLeftMenu(),
            'lastPressData' => $this->articlesRepository->getLatestArticle(),
            'photoGallery' => $this->repo->getPhotoGallery(),
            'lastTerritorialNews' => $this->newsRepository->getLastTerritorialNews(),
            'statistics' => $this->statisticRepository->getStatistics(),
            'statistics_diagram' => (count($statistics)>0)?$statistics:[['name' => 'malumot topilmadi', 'value' => 0]],
            'stat' => (count($stat)>0)?$stat:[['name' => 'malumot topilmadi', 'value' => 0]],
            'year' => 2021,
            'months' => $months
    	];


        return view('home', $data);
    }

    public function mapData()
    {
        $locale = app()->getlocale();

        $data = [];
        $items = [
            211 => ['hc-key' => 'uz-qr', 'oz' => 'Qoraqalpog‘iston', 'uz' => 'Қорақалпоғистон', 'ru' => 'Республика Каракалпакстан', 'en' => 'Karakalpakstan'],
            265 => ['hc-key' => 'uz-an', 'oz' => 'Andijon', 'uz' => 'Андижон', 'ru' => 'Андижан', 'en' => 'Andijan'],
            266 => ['hc-key' => 'uz-bu', 'oz' => 'Buxoro', 'uz' => 'Бухоро', 'ru' => 'Бухарa', 'en' => 'Bukhara'],
            267 => ['hc-key' => 'uz-ji', 'oz' => 'Jizzax', 'uz' => 'Жиззах', 'ru' => 'Джизак', 'en' => 'Jizzakh'],
            268 => ['hc-key' => 'uz-qa', 'oz' => 'Qashqadaryo', 'uz' => 'Қашқадарё', 'ru' => 'Кашкадарья', 'en' => 'Kashkadarya'],
            269 => ['hc-key' => 'uz-nw', 'oz' => 'Navoiy', 'uz' => 'Навоий', 'ru' => 'Навоий', 'en' => 'Navoiy'],
            270 => ['hc-key' => 'uz-sa', 'oz' => 'Samarqand', 'uz' => 'Самарқанд', 'ru' => 'Самарканд', 'en' => 'Samarkand'],
            271 => ['hc-key' => 'uz-ng', 'oz' => 'Namangan', 'uz' => 'Наманган', 'ru' => 'Наманган', 'en' => 'Namangan'],
            272 => ['hc-key' => 'uz-si', 'oz' => 'Sirdaryo', 'uz' => 'Сирдарё', 'ru' => 'Сырдарья', 'en' => 'Syrdarya'],
            273 => ['hc-key' => 'uz-su', 'oz' => 'Surxondaryo', 'uz' => 'Сурхондарё', 'ru' => 'Сурхандарья', 'en' => 'Surkhandarya'],
            274 => ['hc-key' => 'uz-ta', 'oz' => 'Toshkent', 'uz' => 'Тошкент', 'ru' => 'Ташкент', 'en' => 'Tashkent'],
            275 => ['hc-key' => 'uz-fa', 'oz' => 'Farg‘ona', 'uz' => 'Фарғона', 'ru' => 'Ферганa', 'en' => 'Fergana'],
            276 => ['hc-key' => 'uz-kh', 'oz' => 'Xorazm', 'uz' => 'Хоразм', 'ru' => 'Хорезм', 'en' => 'Khorezm'],
            277 => ['hc-key' => 'uz-tk', 'oz' => 'Toshkent', 'uz' => 'Тошкент', 'ru' => 'Ташкент', 'en' => 'Tashkent']
        ];
        $i = 8;

        $mapData = $this->mapRepo->getIndexForFront();

        foreach ($mapData as $key => $map) {
            $item = [
                'name_uz' => $map->position,
                'hc-key' => $items[$map->order]['hc-key'],
                'value' => $i * 100,
                'address' => __('main.Адрес').': '.$map->address,
                'phone' => __('main.Телефон').': '.$map->phone,
                'accept' => __('main.Приёмные дни').': '.$map->reception_days,
                'region_name' => $items[$map->order][$locale],

            ];
            $data[$i] = $item;
            if($i == 19)
                $i+=2;
            else
                $i++;
        }

        $data = json_encode(array_values($data));
        return $data;
    }


    public function search(Request $request)
    {
        if ($request->q) {
            $data = [
                'data' => $this->repo->search($request->q)
            ];
            return view('search', $data);
        }
        return redirect()->route('home');
    }

    public function sendTextError(Request $request)
    {
        $this->layout = false;
        $request = $request->all();
        return Mail::to('media@mehnat.uz')->send(new ErrorText($request));
    }


    public function getCitiesByRegion(Request $request)
    {
        $cities = City::where('region_id', $request->region_id)->get();
        return \Response::json($cities);
    }

    public function oneid()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://data.gov.uz/ru/api/v1/json/dataset?access_key=998db7d21a5693e36a069a7aaee80dfe&authority_id=15&page=1&per-page=10&sphere=1');;
        $data = json_decode($response->getBody()->getContents());
        return view('oneId.oneId', ['data' => $data]);
    }

    public function videoLessons() {
        return view('videoLessons.index');
    }

    public function vacancies(Request $request) {
        $region_id = $request->get('region_id', 0);
        $district_id = $request->get('district_id', 0);
        $vacancies = [];
        $regionsArr = [];
        $districtsArr = [];
        $page = $request->get('page', 1);
        $filter = [
            'vacancy_immediately' => 1,
            'page' => $page
        ];

        $regions = Region::all();
        foreach ($regions as $region) {
            $regionsArr[$region->soato] = [
                'id' => $region->id,
                'name_ru' => $region->name_ru,
                'name_uz' => $region->name_uz,
                'name_cyrl' => $region->name_cyrl,
                'name_en' => $region->name_en,
            ];
        }
        if ($region_id != 0) {
            $districts = City::where('region_id', $region_id)->get();
        }else{
            $districts = City::all();
        }
        foreach ($districts as $district) {
            $districtsArr[$district->soato] = [
                'id' => $district->id,
                'name_ru' => $district->name_ru,
                'name_uz' => $district->name_uz,
                'name_cyrl' => $district->name_cyrl,
                'name_en' => $district->name_en,
            ];
        }

        if ($region_id != 0) {
            $region = Region::find($region_id);
            $filter['soato'] = $region->soato;
        }

        if ($district_id != 0) {
            $district = City::find($district_id);
            $region_id = $district->region_id;
            $filter['soato'] = $district->soato;
        }

        try {
            $client = new Client();
            $response = $client->get("https://ish2.mehnat.uz/api/api/v2/vacancies", ['json' => $filter]);

            $response_body = $response->getBody()->getContents();

            $response_body_res = json_decode($response_body);

            if ($response_body_res->success) {
                $vacancies = $response_body_res->data;
            }

        }catch (\Exception $exception)
        {
            if ($exception->getCode() == 422)
            {
                $message = 'Проверку не прошла';
            }
        }
        return view('vacancies.index', ['regions' => $regionsArr, 'vacancies' => $vacancies, 'districts' => $districtsArr, 'district_id' => $district_id, 'region_id' => $region_id, 'page' => $page]);
    }

}
