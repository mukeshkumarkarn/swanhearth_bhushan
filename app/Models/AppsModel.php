<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppsModel extends Model
{
    use HasFactory;
    ///start

    //



   

    public function getAllApps()
    {
        return App::where('status', 1)
            ->orderBy('display_order', 'asc')
            ->get()
            ->toArray();
    }

    public function getNumerologyApps()
    {
        return App::where('app_type', 'numerology')
            ->where('status', 1)
            ->orderBy('display_order', 'asc')
            ->get()
            ->toArray();
    }



    public function getNumerologySystem()
    {
        $query = DB::table('numerology_system')->get()->toArray();
        return $query;
    }

   
    

    
    public function getMatchCalc($number, $related_number)
    {
        //echo "m1==".$number."<br>";
        //echo "<pre>";print_r($related_number);

        $sql = "select sum(a.number_values) as number_values from (
    			select number_values from numerology_human_match_numbers where base_number=" . $number . " and related_number=" . $related_number[0] . "
    			union all
    			select number_values from numerology_human_match_numbers where base_number=" . $number . " and related_number=" . $related_number[1] . "
    			union all
    			select number_values from numerology_human_match_numbers where base_number=" . $number . " and related_number=" . $related_number[2] . "
    			union all
    			select number_values from numerology_human_match_numbers where base_number=" . $number . " and related_number=" . $related_number[3] . "
    			union all
    			select number_values from numerology_human_match_numbers where base_number=" . $number . " and related_number=" . $related_number[4] . "
    		) a";

        // $query = $this->db->query($sql)->getResultArray();
        $query = DB::select($sql);

        // echo "----<pre>";
        // print_r($query);

        return $query;
    }


    // by name

  

    public function getMatchCalcbyname($number, $related_number)
    {
        $related_number_string = implode(", ", $related_number); // Convert array to a comma-separated string

        $sql = "SELECT SUM(a.number_values) AS number_values FROM (
        SELECT number_values FROM numerology_human_match_numbers WHERE base_number = $number AND related_number IN ($related_number_string)
    ) a";

        $query = DB::select($sql);

        return $query;
    }






    //end
}
