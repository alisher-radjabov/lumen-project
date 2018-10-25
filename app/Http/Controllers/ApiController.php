<?php

namespace App\Http\Controllers;

use App\Models\Ayat;
use App\Models\Ayat2;
use App\Models\Tafasir;
use App\Models\Tafsir;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get list of definitions (tafsir)
     *
     * @param $key
     * @param $sura_number
     * @param $aya_number
     * @return array
     */
    public function getTafsir($key, $sura_number, $aya_number)
    {

        return Tafsir::getTafsirByKeys($key, $sura_number, $aya_number);;

    }

    /**
     * Get list of definitions for full page
     *
     * @param $keys
     * @param $sura_number
     * @return array
     */
    public function getPageTafsir($keys, $sura_number)
    {

        return Tafsir::getPageTafsir($keys, $sura_number);

    }

    /**
     * Get list of All Tafasir
     *
     * @return mixed
     */
    public function getTafasir()
    {
        //
        return Tafasir::all();
    }

    /**
     * Get list of ayat based on page number
     *
     * @param $page_number
     * @return mixed
     */
    public function getAyatByPageNumber($page_number)
    {
        //
        return Ayat::getAyatByPageNumber($page_number);

    }

    /**
     * Get list of ayat characters codes based on page number (according to new Al-Madina Mosshaf)
     *
     * @param $page_number
     * @return mixed
     */
    public function getAyat2($page_number)
    {
        //
        return Ayat2::getAyat2ByPageNumber($page_number);

    }

}
