<?php

namespace App\Http\Controllers;

use App\Helpers\ArrayCustom;
use Illuminate\Http\Request;

class OtherTestController extends Controller
{
    public function index()
    {
        $array1 = array(1,12,31,5,3,23,4,5,22);
        $array2 = array(-0.5,-0.76,0.45,-0.2,4.5,3.5);
        $array3 = array(98,12,42,13,13,56,100,99);

        $letters1 = array("A","B","C","B","A");
        $letters2 = array('A','B','C','D','E','C','F','Z');
        $letters3 = array("A","B","C","X","Y","Z");

        $value1['array'] = array(1,2,4,4,5,6,7,7,8,8);
        $value1['parameter'] = 12;

        $value2['array'] = array(1,2,4,4,5,8,9,9,12,19);
        $value2['parameter'] = 4;
        
        $value3['array'] = array(-9.3, -0.5, 0.25 ,0.3 ,1.34);
        $value3['parameter'] = -7.96;
        return array(
            'soal_1' => [
                'a' => ArrayCustom::SortNumber($array1),
                'b' => ArrayCustom::SortNumber($array2),
                'c' => ArrayCustom::SortNumber($array3)
            ],
            'soal_2' => [
                'a' => ArrayCustom::SortChar($letters1),
                'b' => ArrayCustom::SortChar($letters2),
                'c' => ArrayCustom::SortChar($letters3)
            ],
            'soal_3' => [
                'a' => ArrayCustom::Penjumlahan($value1),
                'b' => ArrayCustom::Penjumlahan($value2),
                'c' => ArrayCustom::Penjumlahan($value3),
            ],
            
        );
    }
    
}
