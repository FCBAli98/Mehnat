<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Repositories\ServicesRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ServicesController extends Controller
{

    protected $repo;
    public function __construct(ServicesRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($name, Request $request)
    {
        $min_sum = 679330;

        if(isset($request->razryad)) {
            $razryad = $request->razryad;
            $summa = $min_sum * $razryad;
        }

        $model = $this->repo->findByNameArticle($name);

        $resources = [
            '1.000' => 1,
            '1.053' => 2,
            '1.106' => 3,
            '1.158' => 4,
            '1.269' => 5,
            '1.384' => 6,
            '1.505' => 7,
            '1.630' => 8,
            '1.755' => 9,
            '1.883' => 10,
            '2.014' => 11,
            '2.148' => 12,
            '2.284' => 13,
            '2.421' => 14,
            '2.561' => 15,
            '2.704' => 16,
            '2.847' => 17,
            '2.993' => 18,
            '3.141' => 19,
            '3.292' => 20,
            '3.444' => 21,
            '3.597' => 22
        ];

      $data = [
            'model' => $model,
            'summa' => $summa ?? null,
            'razryad' => $razryad ?? null,
            'resources' => $resources
      ];

      if($name == 'kasbga-qayta-tayyorlash-dasturlarida-ishtirok-etuvchi-talim-tashkilotlarini-elektron-reestri'){
          $client = new Client(['verify' => false]);
          $response = $client->get('https://sertifikat.mehnat.uz/api/api/v1/get-company',
              [
                'query' => [
                    'page' => $request->page
                ]
              ]);
          $result = json_decode($response->getBody(), true);
          $paginate = json_decode($response->getBody())->data;
          $pagination = new LengthAwarePaginator($paginate->data, $paginate->total, $paginate->per_page,
              $paginate->current_page, ['path' => '/services/kasbga-qayta-tayyorlash-dasturlarida-ishtirok-etuvchi-talim-tashkilotlarini-elektron-reestri']);
          if($result['success']){
              $lang = \LaravelLocalization::setLocale();
              switch ($lang){
                  case 'uz':
                      $title = 'Касбга қайта тайёрлаш дастурларида иштирок етувчи таълим ташкилотларини електрон реестри';
                      break;
                  case 'oz':
                      $title = 'Kasbga qayta tayyorlash dasturlarida ishtirok etuvchi ta\'lim tashkilotlarini elektron reestri';
                      break;
                  case 'ru':
                      $title = 'Электронный реестр учебных заведений, участвующих в программах переподготовки';
                      break;
                  case 'en':
                      $title = 'Electronic register of educational institutions participating in retraining programs';
                      break;
              }
              return view('services.show_reestr', ['title' => $title, 'result' => $result['data'], 'paginate' => $pagination]);
          }
      }
        return view('services.show', $data);
    }
    
     public function showMobile($name, Request $request)
    {
        $min_sum = 679330;

        if(isset($request->razryad)) {
            $razryad = $request->razryad;
            $summa = $min_sum * $razryad;
        }

        $model = $this->repo->findByNameArticle($name);

        $resources = [
            '1.000' => 1,
            '1.053' => 2,
            '1.106' => 3,
            '1.158' => 4,
            '1.269' => 5,
            '1.384' => 6,
            '1.505' => 7,
            '1.630' => 8,
            '1.755' => 9,
            '1.883' => 10,
            '2.014' => 11,
            '2.148' => 12,
            '2.284' => 13,
            '2.421' => 14,
            '2.561' => 15,
            '2.704' => 16,
            '2.847' => 17,
            '2.993' => 18,
            '3.141' => 19,
            '3.292' => 20,
            '3.444' => 21,
            '3.597' => 22
        ];

        $data = [
            'model' => $model,
            'summa' => $summa ?? null,
            'razryad' => $razryad ?? null,
            'resources' => $resources
        ];

        if($name == 'kasbga-qayta-tayyorlash-dasturlarida-ishtirok-etuvchi-talim-tashkilotlarini-elektron-reestri'){
            $client = new Client(['verify' => false]);
            $response = $client->get('https://sertifikat.mehnat.uz/api/api/v1/get-company',
                [
                    'query' => [
                        'page' => $request->page
                    ]
                ]);
            $result = json_decode($response->getBody(), true);
            $paginate = json_decode($response->getBody())->data;
            $pagination = new LengthAwarePaginator($paginate->data, $paginate->total, $paginate->per_page,
                $paginate->current_page, ['path' => '/services/kasbga-qayta-tayyorlash-dasturlarida-ishtirok-etuvchi-talim-tashkilotlarini-elektron-reestri']);
            if($result['success']){
                $lang = \LaravelLocalization::setLocale();
                switch ($lang){
                    case 'uz':
                        $title = 'Касбга қайта тайёрлаш дастурларида иштирок етувчи таълим ташкилотларини електрон реестри';
                        break;
                    case 'oz':
                        $title = 'Kasbga qayta tayyorlash dasturlarida ishtirok etuvchi ta\'lim tashkilotlarini elektron reestri';
                        break;
                    case 'ru':
                        $title = 'Электронный реестр учебных заведений, участвующих в программах переподготовки';
                        break;
                    case 'en':
                        $title = 'Electronic register of educational institutions participating in retraining programs';
                        break;
                }
                return view('services.show_reestr', ['title' => $title, 'result' => $result['data'], 'paginate' => $pagination]);
            }
        }
        return view('services.show_mobile', $data);
    }

}
