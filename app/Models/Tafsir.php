<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tafsir extends Model
{

    protected $table = "quran_text";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get tafsir from other tables corresponding tables by $keys parameter
     *
     * @param $keys
     * @param $sura_number
     * @param $aya_number
     * @return array
     */
    public static function getTafsirByKeys($keys, $sura_number, $aya_number)
    {
        $keys_array = explode(',', $keys);
        $out = [];

        $quranText = DB::table('quran_text')
            ->where('quran_text.sura', $sura_number)->where('quran_text.aya', $aya_number)
            ->get()->toArray();

        foreach ($keys_array as $key) {
            $data = DB::table("$key")
                ->where('sura', $sura_number)->where('aya', $aya_number)
                ->get()->toArray();

            $out[$key] = $data[0]->nass;
        }

        $results = [
            'sura_number' => $sura_number,
            'aya_number' => $sura_number,
            'text' => $quranText[0]->text,
            'tafsir' => $out
        ];

        return $results;

    }

    /**
     * Get all aya definitions (tafasir) based on sura_number
     *
     * @param $keys
     * @param $sura_number
     * @return array
     */
    public static function getPageTafsir($keys, $sura_number)
    {

        $keys_array = explode(',', $keys);
        $out = [];
        $body = [];

        foreach ($keys_array as $key) {
            $metadata = DB::table('tafasir')
                ->select('caption')
                ->where('name', '=', $key)
                ->get()->toArray();

            $out[$key] = $metadata[0]->caption;
        }

        foreach ($keys_array as $key) {
            $data = DB::table("$key")
                ->where('sura', $sura_number)
                ->get()->toArray();

            foreach ($data as $row){
                $body[$sura_number . '_' . $row->aya][$key] = $row->nass;
            }

        }

        $results = [
            'meta' => $out,
            'body' => $body
        ];

        return $results;

    }


}
