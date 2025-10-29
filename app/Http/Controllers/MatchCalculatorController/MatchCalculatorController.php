<?php

namespace App\Http\Controllers\MatchCalculatorController;

use App\Models\AppsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\numerology_searched_item;
use App\Models\User;
use App\Models\dynamic_metas;
use App\Models\stories_dating;
use Illuminate\Support\Facades\Auth;

class MatchCalculatorController extends Controller
{
    //cotroll


    // laravel code
    private function _getNumerologySystem()
    {
        $appsModel = new AppsModel();
        $getNumerologySystem = $appsModel->getNumerologySystem();
        $arr_pythagoreous_number = [];
        $arr_chaldean_number = [];

        foreach ($getNumerologySystem as $system) {
            $arr_pythagoreous_number[$system->alphabet] = $system->pythagoreous_number;
            $arr_chaldean_number[$system->alphabet] = $system->chaldean_number;
        }

        $request = request();
        $radCountries = $request->input('radCountries');

        $arrData = ($radCountries == 'asian') ? $arr_chaldean_number : $arr_pythagoreous_number;

        return $arrData;
    }



    private function _calcLPN($dob)
    {
        $dob = str_replace("-", "", $dob);
        while ($dob > 9) {
            $arrDob = str_split($dob);
            $dob = array_sum($arrDob);
        }
        $getDetails = $dob;
        return $getDetails;
    }







    private function _calcBN($dob)
    {
        $hyphenIndex = strrpos($dob, '-') + 1;
        $dob = substr($dob, $hyphenIndex);
        while ($dob > 9) {
            $arrDob = str_split($dob);
            $dob = array_sum($arrDob);
        }
        $getDetails = $dob;
        return $getDetails;
    }




    private function _calcEN($fullName)
    {

        $arrData = $this->_getNumerologySystem();
        $calcVal = 0;
        $arrFullName = str_split(strtolower($fullName));

        foreach ($arrFullName as $valName) {
            if (array_key_exists($valName, $arrData)) {
                $valVo = $arrData[$valName];
                $calcVal += $valVo;
            }
        }

        while ($calcVal > 9) {
            $arrCalcVal = str_split($calcVal);
            $calcVal = array_sum($arrCalcVal);
        }
        $getDetails = $calcVal;

        return $getDetails;
    }


    private function _calcSN($fullName)
    {
        $arrData = $this->_getNumerologySystem();
        $calcVal = 0;
        $fullName = str_split(strtolower($fullName));
        $vowels = ["a", "e", "i", "o", "u"];
        foreach ($fullName as $valName) {
            if (in_array($valName, $vowels)) {
                $valVo = $arrData[$valName];
                $calcVal += $valVo;
            }
        }
        while ($calcVal > 9) {
            $arrCalcVal = str_split($calcVal);
            $calcVal = array_sum($arrCalcVal);
        }
        $getDetails = $calcVal;
        return $getDetails;
    }



    private function _calcOPN($fullName)
    {
        $arrData = $this->_getNumerologySystem();
        $calcVal = 0;
        $fullName = str_split(strtolower($fullName));
        $consonants = ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "y", "z"];
        foreach ($fullName as $valName) {
            if (in_array($valName, $consonants)) {
                $valVo = $arrData[$valName];
                $calcVal += $valVo;
            }
        }
        while ($calcVal > 9) {
            $arrCalcVal = str_split($calcVal);
            $calcVal = array_sum($arrCalcVal);
        }
        $getDetails = $calcVal;
        return $getDetails;
    }







    // laravel code
    public function _getMatchCalculator(Request $request)
    {
        //dd($request->all());
        $appsModel = new AppsModel();
        $ip = $request->ip();
        $userId = $request->userId;

        $fullName = $request->txtNumerologyName;
        $dob = $request->txtNumerologyDOB;
        $txtNumerologyCrushName = $request->txtNumerologyCrushName;
        $txtNumerologyCrushDOB = $request->txtNumerologyCrushDOB;

        $getFirstLPN = $this->_calcLPN($dob);

        $getSecondLPN = $this->_calcLPN($txtNumerologyCrushDOB);

        $getFirstBN = $this->_calcBN($dob);

        $getSecondBN = $this->_calcBN($txtNumerologyCrushDOB);

        $getFirstEN = $this->_calcEN($fullName);

        $getSecondEN = $this->_calcEN($txtNumerologyCrushName);


        $getFirstSN = $this->_calcSN($fullName);

        $getSecondSN = $this->_calcSN($txtNumerologyCrushName);

        $getFirstOPN = $this->_calcOPN($fullName);

        $getSecondOPN = $getSecondOPN[0]['number_value'] = $this->_calcOPN($txtNumerologyCrushName);

        $related_numberfirst = [$getFirstLPN, $getFirstBN, $getFirstEN, $getFirstSN, $getFirstOPN];
        //dd($related_numberfirst);
        $related_number = [$getSecondLPN, $getSecondBN, $getSecondEN, $getSecondSN, $getSecondOPN];
        //dd($related_number);

        $getCalcLPN = $appsModel->getMatchCalc($getFirstLPN, $related_number);
        $getCalcLPN = $getCalcLPN[0]->number_values;

        $getCalcBN = $appsModel->getMatchCalc($getFirstBN, $related_number);
        $getCalcBN = $getCalcBN[0]->number_values;

        $getCalcEN = $appsModel->getMatchCalc($getFirstEN, $related_number);
        $getCalcEN = $getCalcEN[0]->number_values;

        $getCalcSN = $appsModel->getMatchCalc($getFirstSN, $related_number);
        $getCalcSN = $getCalcSN[0]->number_values;

        $getCalcOPN = $appsModel->getMatchCalc($getFirstOPN, $related_number);
        $getCalcOPN = $getCalcOPN[0]->number_values;

        // Summing up match values
        $totalSum = $getCalcLPN + $getCalcBN + $getCalcEN + $getCalcSN + $getCalcOPN;
        if ($totalSum >= 0 && $totalSum <= 10) {
            $totalSum += env('ONETOTEN');
        } elseif ($totalSum > 10 && $totalSum <= 20) {
            $totalSum += env('TENTOTWENTY');
        } elseif ($totalSum > 20 && $totalSum <= 30) {
            $totalSum += env('TWENTYTOTHIRTY');
        } elseif ($totalSum > 30 && $totalSum <= 40) {
            $totalSum += env('THIRTYTOFOURTY');
        } elseif ($totalSum > 40 && $totalSum <= 50) {
            $totalSum += env('FOURTYTOFIFTY');
        }
        $maxMarks = 100;
        $percentage = round(($totalSum / $maxMarks) * 100);

        $seachData = new numerology_searched_item([
            "search_name" => $fullName,
            "search_dob" => $dob,
            "crush_name" => $txtNumerologyCrushName,
            "crush_dob" => $txtNumerologyCrushDOB,
            "ip" => $ip,
            "app_name" => 'love-calculator-name-dob',
            "usrId" => $userId,
            "totalSum" => $totalSum,
            "percentage" => $percentage,
        ]);
        $seachData->save();

        return $percentage;
    }





    public function bynameMatchCalculator(Request $request)
    {
        //dd($request->all());
        $appsModel = new AppsModel();
        $userId = $request->userId;
        $fullNames = $request->txtNumerologyName;
        $txtNumerologyCrushNames = $request->txtNumerologyCrushName;

        $ip = $request->ip();


        $getFirstEN = $this->_calcEN($fullNames);
        $getSecondEN = $this->_calcEN($txtNumerologyCrushNames);

        $getFirstSN = $this->_calcSN($fullNames);

        $getSecondSN = $this->_calcSN($txtNumerologyCrushNames);

        $getFirstOPN = $this->_calcOPN($fullNames);

        $getSecondOPN = $getSecondOPN[0]['number_value'] = $this->_calcOPN($txtNumerologyCrushNames);

        $related_numberfirst = [$getFirstEN, $getFirstSN, $getFirstOPN];
        //dd($related_numberfirst);
        $related_number = [$getSecondEN, $getSecondSN, $getSecondOPN];
        //dd($related_number);

        $getCalcEN = $appsModel->getMatchCalcbyname($getFirstEN, $related_number);
        $getCalcEN = $getCalcEN[0]->number_values;

        $getCalcSN = $appsModel->getMatchCalcbyname($getFirstSN, $related_number);
        $getCalcSN = $getCalcSN[0]->number_values;

        $getCalcOPN = $appsModel->getMatchCalcbyname($getFirstOPN, $related_number);
        $getCalcOPN = $getCalcOPN[0]->number_values;

        // Summing up match values
        $totalSum = $getCalcEN + $getCalcSN + $getCalcOPN;

        if ($totalSum >= 0 && $totalSum <= 10) {
            $totalSum += env('ONETOTEN');
        } elseif ($totalSum > 10 && $totalSum <= 20) {
            $totalSum += env('TENTOTWENTY');
        } elseif ($totalSum > 20 && $totalSum <= 30) {
            $totalSum += env('TWENTYTOTHIRTY');
        } elseif ($totalSum > 30 && $totalSum <= 40) {
            $totalSum += env('THIRTYTOFOURTY');
        } elseif ($totalSum > 40 && $totalSum <= 50) {
            $totalSum += env('FOURTYTOFIFTY');
        }

        $maxMarks = 100;
        $percentages = round(($totalSum / $maxMarks) * 100);
        $seachData = new numerology_searched_item([
            "search_name" => $fullNames,
            "crush_name" => $txtNumerologyCrushNames,
            "ip" => $ip,
            "app_name" => 'love-calculator-name',
            "usrId" => $userId,
            "totalSum" => $totalSum,
            "percentage" => $percentages,
        ]);
        $seachData->save();
        return $percentages;
    }
}
