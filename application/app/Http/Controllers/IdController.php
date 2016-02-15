<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;

class IdController extends Controller
{
    /**
     * Generates a checkbit using the leading 12 characters of a South African ID Number
     *
     * @param string $id leading 12 digits of a South African ID Number
     * Implemented according to given specification
     *
     * @return int
     */
    protected function generate_checkbit($id)
    {
        $d = -1;
        $id_chars = str_split($id);
        try {
            $a = 0;
            for($i = 0; $i < 6; $i++) {
                $a += intval($id_chars[2*$i]);
            }

            $b = 0;
            for($i = 0; $i < 6; $i++) {
                $b =  $b * 10 + intval($id_chars[2*$i + 1]);
            }
            $b *= 2;

            $c = 0;
            do
            {
                $c += $b % 10;
                $b = $b / 10;
            }
            while($b > 0);

            $c += $a;
            $d = 10 - ($c % 10);

            if ($d == 10) $d = 0;
        } catch (Exception $exception) {
            throw $exception;
        }
        return $d;
    }
    protected function random_sequence($length = 3)
    {
        $chars = '0123456789';
        $sequence = '';

        for($i = 0; $i < $length; $i++) {
            $sequence .= $chars[rand(0, 9)];
        }

        return $sequence;
    }
    /**
     * Generates a Valid South African ID Number
     *
     * @return string
     */
    protected function generate_id()
    {
        $timestamp = mt_rand(1, time());
        $date = date('ymd', $timestamp);

        $gender = mt_rand(0, 9);

        $sequence = $this->random_sequence();

        $citizen = mt_rand(0, 1);

        //33.33% chance not to be 8 or 9 since the number is not always 8 or 9
        $random = mt_rand(7, 9);
        if($random == 7) {
            $random = mt_rand(1, 7);
        }

        $id = $date . $gender . $sequence . $citizen . $random;
        $checkbit = $this->generate_checkbit($id);

        return $id . $checkbit;
    }
    /**
     * Validates a South African ID Number
     *
     * @param string $id South African ID Number
     *
     * @return boolean
     */
    protected function validate_id($id)
    {
        $checkbit = $this->generate_checkbit(substr($id, 0, 12));
        if ($checkbit == str_split($id)[12]) {
            return true;
        }
        return false;
    }
    /**
     * Responds on the GET request url /api/id
     *
     * Generates a valid South African ID Number
     */
    public function index()
    {
        $id = $this->generate_id();

        return response()->json(array(
            'id' => $id
        ));
    }
    /**
     * Responds on the GET request url /api/id/{id}
     *
     * Validate a South African ID Number
     *
     * @param string $id South African ID Number
     * @response json
     */
    public function show($id)
    {
        if(!preg_match("/^\\d{13}$/",$id)) {
            return response()->json(array(
                'error' => 'The given South African ID Number is invalid.'
            ), 400);
        }  else {
            $valid = $this->validate_id($id);

            return response()->json(array(
                'valid' => $valid
            ));
        }
    }
}
