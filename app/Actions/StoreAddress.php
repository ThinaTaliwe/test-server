<?php

/**
 * PHP version 9
 *
 * @author    Siyabonga Alexander Mnguni <alexmnguni57@gmail.com>
 * @author    Thina Taliwe <thina.taliwe2@gmail.com>
 * @copyright 2023 1Office
 * @license   MIT License
 * @link      https://github.com/alexmnguni57/1Office-GBA
 */

namespace App\Actions;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;

/**
 * Class StoreAddress
 *
 * @package App\Actions
 */
class StoreAddress
{
    /**
     * Handle the data to store a new Address record
     *
     * @param object $data //
     *
     * @return Address
     */
    public function handle($data): Address
    {

        $country = strtoupper($data->Country);

        $province = strtoupper($data->Province);

        $city = strtoupper($data->City);



        //Check if exists, if doesnt then add record

        checkCountry($country);

        $countryId = Country::where('name', $country)->first()->id;



        checkProvince($province, $countryId);

        $provinceId = Province::where('name', $province)->first()->id;



        checkCity($city, $countryId, $provinceId);

        $cityId = City::where('name', $city)->first()->id;









        //Address

        $address = new Address();



        $address->adress_type_id = 1;

        $address->line1 = $data->Line1;

        $address->suburb = $data->TownSuburb;

        $address->city_id = $cityId;

        $address->city = $city;

        $address->ZIP = $data->PostalCode;

        $address->district = $data->Line2;

        $address->province_id = $provinceId;

        $address->province = $province;

        $address->country_id = $countryId;





        try {

            $address->save();

        } catch (\Exception $exception) {
            throw $exception;
        }
   
        return $address;

    }
}