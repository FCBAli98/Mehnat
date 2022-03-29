<?php

namespace App\Http\Controllers;

use App\Salary;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function openData($slug)
    {
        switch ($slug){
            case '2021-yildagi-ish-kunlari-kalendari':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610270bf2a2e256d868e8326&token=6166eaf0b17932704f72ff66';
                break;
            case 'band-kvota-qilib-qoyilgan-ish-orinlariga-ishga-joylashtirilganlar':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=6102700f2a2e256d868e8320&token=6166eaf0b17932704f72ff66';
                break;
            case 'bandlik-va-mehnat-munosabatlari-vazirligining-investitsiya-loyihalari-togrisida-malumot':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610259922a2e256d868e82e9&token=6166eaf0b17932704f72ff66';
                break;
            case 'bilimni-baholash-markazlari-reyestri':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=61025d812a2e256d868e8302&token=6166eaf0b17932704f72ff66';
                break;
            case 'chet-elda-ishlash-uchun-shartnoma-shartlari-haqida-malumot':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=6102590f2a2e256d868e82e5&token=6166eaf0b17932704f72ff66';
                break;
            case 'davlat-mehnat-inspeksiyasi-faoliyatiga-oid-meyoriy-huquqiy-hujjatlar':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=61026f262a2e256d868e831a&token=6166eaf0b17932704f72ff66';
                break;
            case 'davlat-mehnat-inspeksiyasi-tomonidan-mehnat-qonunchiligi-boyicha-otkazilgan-tekshirishlar-organishlar':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=6102703f2a2e256d868e8322&token=6166eaf0b17932704f72ff66';
                break;
            case 'davlat-organlari-va-tashkilotlari-tasarrufidagi-xizmat-avtomototransport-vositalari-xizmat-uylari-va-boshqa':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=613ef71514665dbb8ec804a4&token=6166eaf0b17932704f72ff66';
                break;
            case 'davlat-va-xojalik-boshqaruvi-organi-joylardagi-davlat-hokimiyati-organlari':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610257192a2e256d868e82d7&token=6166eaf0b17932704f72ff66';
                break;
            case 'davlat-xaridlari-togrisidagi-malumotlar-shu-jumladan-davlat-xaridlarini-amalga-oshiruvchi-shaxslar':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=613ef60b14665dbb8ec804a0&token=6166eaf0b17932704f72ff66';
                break;
            case 'fuqarolarning-murojaatlarini-korib-chiqish-natijalari-va-murojaat-kanallari-boyicha-malumot':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610258c32a2e256d868e82e3&token=6166eaf0b17932704f72ff66';
                break;
            case 'mansabdor-shaxslarning-xizmat-safarlari-va-xorijdan-tashrif-buyurgan-mehmonlarni-kutib-olish-xarajatlari':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=613ef69714665dbb8ec804a2&token=6166eaf0b17932704f72ff66';
                break;
            case 'mavjud-vakant-ish-joylari-haqida-malumot':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610258842a2e256d868e82e1&token=6166eaf0b17932704f72ff66';
                break;
            case 'mehnat-organlari-tomonidan-yoshlarni-ishga-joylashtirish-holati':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610270f92a2e256d868e8328&token=6166eaf0b17932704f72ff66';
                break;
            case 'mehnat-togrisidagi-qonun-hujjatlariga-rioya-etilishini-tekshirishlar-otkazilishi-togrisida-malumot':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610259cd2a2e256d868e82eb&token=6166eaf0b17932704f72ff66';
                break;
            case 'mehnatni-muxofaza-qilish-sohasidagi-xizmatlar-bozorining-professional-ishtirokchilari-yagona-reyestri':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=61025ec62a2e256d868e8313&token=6166eaf0b17932704f72ff66';
                break;
            case 'noqulay-mehnat-sharoitlarida-ishlash-uchun-tegishli-imtiyozlar-royxati':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=61025a172a2e256d868e82ed&token=6166eaf0b17932704f72ff66';
                break;
            case 'rahbariyatning-qabul-kunlari-va-aloqa-malumotlari':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610255ef2a2e256d868e82ce&token=6166eaf0b17932704f72ff66';
                break;
            case 'tashkilotning-quyi-tashkilotlari-filiallari-va-hududiy-bolinmalari':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610258482a2e256d868e82df&token=6166eaf0b17932704f72ff66';
                break;
            case 'vazirlikning-choraklik-yarim-yillik-va-yillik-hisobotlari':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610259512a2e256d868e82e7&token=6166eaf0b17932704f72ff66';
                break;
            case 'xorijga-mehnat-faoliyatini-amalga-oshirish-uchun-ketayotgan-ozbekiston-respublikasi-fuqarolarining-bilimini-baholash-markazlari-reyestri':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=610270832a2e256d868e8324&token=6166eaf0b17932704f72ff66';
                break;
            case 'xususiy-bandlik-agentliklari-reyestri':
                $data = 'https://data.egov.uz/apiPartner/Partner/Get?offset=0&GuidId=61025df22a2e256d868e8308&token=6166eaf0b17932704f72ff66';
                break;
        }

        $client = new Client();
        $response = ($client->get($data));
        $result = json_decode($response->getBody(), true);
        $lang = \LaravelLocalization::setLocale();
        switch ($lang){
            case 'uz':
                $local = 'uzbKrText';
                break;
            case 'oz':
                $local = 'uzbText';
                break;
            case 'ru':
                $local = 'rusText';
                break;
            case 'en':
                $local = 'engText';
                break;
        }
//        return $result['result'];
        return view('open-data.'.$slug, ['result' => $result, 'lang' => $local]);
    }

    public function salary()
    {
        $salary = Salary::get();
        $oklad = 822000;
        return view('salary', compact(['salary', 'oklad']));
    }
    
    public function salaryMobile()
    {
        $salary = Salary::get();
        $oklad = 822000;
        return view('salary-mobile', compact(['salary', 'oklad']));
    }

    public function svod()
    {
        return view('svod');
    }
}
