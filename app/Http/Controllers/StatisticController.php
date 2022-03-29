<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegionStatisticRequest;
use App\Http\Requests\StoreStatisticRequest;
use App\Region;
use App\Repositories\StatisticRepository;
use App\Statistic;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class StatisticController extends Controller
{
    protected $repo;
    public function __construct(StatisticRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'models' => $this->repo->getIndex()->appends(Input::except('page')),
            'parents' => $this->repo->getStatisticsTree(),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];

        return view('admin.statistics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => $this->repo->getModel(),
            'parents' => $this->repo->getStatisticsTree(),
            'languages' => $this->repo->getLanguagesArr()
        ];
        return view('admin.statistics.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStatisticRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatisticRequest $request)
    {
        $result = $this->repo->create($request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('statistics.show', ['id' => $result->id]);
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        $data = [
            'model' => $this->repo->findById($statistic->id),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];
        return view('admin.statistics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        $model = $this->repo->findById($statistic->id);
        $data = [
            'model' => $model,
            'parents' => $this->repo->getStatisticsTree(),
            'languages' => $this->repo->getLanguagesArr()
        ];
        return view('admin.statistics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreStatisticRequest $request
     * @param \App\Statistic $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStatisticRequest $request, Statistic $statistic)
    {
        $result = $this->repo->update($statistic->id, $request->validated());
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('statistics.show', ['id' => $statistic->id]);
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        $result = $this->repo->delete($statistic->id);
        if ($result) {
            $request->session()->flash('success', 'Success');
            return redirect()->route('statistics.index');
        }else{
            $request->session()->flash('error', 'Error');
            return back();
        }
    }

    public function regionStatistics() {
        $data = [
            'models' => $this->repo->getRegionsStatistics(),
            'parents' => $this->repo->getStatisticsTree(),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];
        return view('admin.statistics.regions_statistics', $data);
    }

    public function createRegionStatistics() {

        $data = [
            'model' => $this->repo->getModel(),
            'regions' => Region::pluck('name_uz', 'id'),
            'parents' => $this->repo->getStatisticsTree(),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];

        return view('admin.statistics.create_regions_statistics', $data);
    }

    public function editRegionStatistics($id) {

        $data = [
            'model' => DB::table('statistics_regions')->where('id', $id)->first(),
            'regions' => Region::pluck('name_uz', 'id'),
            'parents' => $this->repo->getStatisticsTree(),
            'languages' => $this->repo->getLocaleListForLangParam()
        ];

        return view('admin.statistics.edit_regions_statistics', $data);
    }

    public function storeRegionStatistics(StoreRegionStatisticRequest $request) {

        $row = DB::table('statistics_regions')
            ->where([['region_id', $request->region_id], ['statistic_id', $request->statistic_id]]);

        if ($request->year) {
            $row->where('year', $request->year);
        }

        $rs = $row->first();

        if ($rs) {
            DB::table('statistics_regions')->where('id', $rs->id)->update(['value' => $request->value]);
        }else{
            DB::table('statistics_regions')->insert([
                'region_id' => $request->region_id,
                'statistic_id' => $request->statistic_id,
                'value' => $request->value,
                'year' => $request->year
            ]);
        }

        return redirect()->route('regions_statistics');
    }

    public function showStatisticsByRegions($statistics_id) {
        $locale = App::getLocale();

        if ($locale == 'ru') {
            $locale_name = 'r.name_ru';
        }elseif ($locale == 'en') {
            $locale_name = 'r.name_en';
        }elseif ($locale == 'oz') {
            $locale_name = 'r.name_uz';
        }else {
            $locale_name = 'r.name_cyrl';
        }

        $statistics = Statistic::find($statistics_id);
        $max = 0;

        $statisticsByRegions = DB::table("statistics_regions as sr")
            ->join('regions as r', 'sr.region_id', '=', 'r.id')
            ->where('sr.statistic_id', $statistics_id)
            ->select($locale_name.' as region', 'sr.value', 'sr.year')
            ->orderBy('sr.value', 'desc')
            ->get();

        if (isset($statisticsByRegions[0])){
            if ($statisticsByRegions[0]->value >= 1000 && $statisticsByRegions[0]->value < 5000) {
                $max = 5000;
            }elseif ($statisticsByRegions[0]->value >= 5000 && $statisticsByRegions[0]->value < 10000) {
                $max = 10000;
            }elseif ($statisticsByRegions[0]->value >= 10000 && $statisticsByRegions[0]->value < 20000) {
                $max = 20000;
            }elseif ($statisticsByRegions[0]->value >= 20000 && $statisticsByRegions[0]->value < 40000) {
                $max = 40000;
            }elseif ($statisticsByRegions[0]->value >= 40000 && $statisticsByRegions[0]->value < 100000) {
                $max = 100000;
            }

        }


        return view('Statistics.show', ['statistics' => $statistics, 'statisticsByRegions' => $statisticsByRegions, 'maxValue' => $max]);
    }

}
