<?php

namespace App\Http\Controllers;

use App\Repositories\RegionsRepository;

class RegionController extends Controller
{
    protected $mapRepo;

    public function __construct(RegionsRepository $mapRepo)
    {
        $this->mapRepo = $mapRepo;
    }

    public function index()
    {

        $mapData = $this->mapData();

        $data = [
            'mapData' => $mapData['data'],
            'statistics' => $mapData['statistics']
        ];

        return view('regions.index', $data);
    }

    public function mapData()
    {
        $result = [];
        $data = [];

        $legal_count = 0;
        $male_count = 0;
        $female_count = 0;

        $i = 8;

        $mapData = $this->mapRepo->getIndexForFront();

        foreach ($mapData as $key => $map) {
            $legal_count += $map->legal_entity_count;
            $male_count += $map->male_count;
            $female_count += $map->female_count;

            $item = [
                'name_uz' => $map->title,
                'hc-key' => $map->hc_key,
                'value' => $i * 100,
                'legal_entity_count' => __('main.legal_count').': '.number_format($map->legal_entity_count, 0, '.', ' '),
                'physical_entity_count' => __('main.physical_count').': '.number_format(($map->male_count + $map->female_count), 0, '.', ' '),
                'male_count' => __('main.male_count').': '.number_format($map->male_count, 0, '.', ' '),
                'female_count' => __('main.female_count').': '.number_format($map->female_count, 0, '.', ' '),

            ];
            $data[$i] = $item;
            if($i == 19)
                $i+=2;
            else
                $i++;
        }

        $result['data'] = json_encode(array_values($data));
        $result['statistics'] = [
            'legal_count' => number_format($legal_count, 0, '.', ' '),
            'physical_count' => number_format(($male_count + $female_count), 0, '.', ' '),
            'male_count' => number_format($male_count, 0, '.', ' '),
            'female_count' => number_format($female_count, 0, '.', ' '),
        ];
        return $result;
    }
}
