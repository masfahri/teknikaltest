<?php
namespace App\Helpers;

class ArrayCustom  
{
    public static function SortNumber($array)
    {
        $n = count($array);
        $gede1 = $array[0]; 
        $gede2 = $array[1]; 
        for ($i=0; $i < $n ; $i++) { 
            if ($gede1 < $array[$i]) {
                $gede2 = $gede1;
                $gede1 = $array[$i];
            } else if ($gede2 < $array[$i]) $gede2 = $array[$i];
        } return "$gede2";
        
    }

    public static function SortChar($array)
    {
        $sameLetter = 'false';
        for ($i=0; $i < count($array); $i++) { 
            for ($j=$i; $j < count($array) ; $j++) { 
                if ($i!=$j && $array[$i] == $array[$j]) $sameLetter = $array[$i];
            }
        }
        return "$sameLetter";
    }

    public static function Penjumlahan($data)
    {
        $isSame = false;
        $number_1 = 0;
        $number_2 = 0;

        $sameNumbers = array();
        for ($i=0; $i < count($data['array']); $i++) { 
            for ($j=$i; $j < count($data['array']); $j++) { 
                if ($i!=$j && $data['array'][$i] == $data['array'][$j]) {
                    $sameNumbers[] = $data['array'][$i];
                }
            }
        }

        for ($i=0; $i < count($sameNumbers); $i++) {
            for ($j=$i; $j< count($sameNumbers); $j++) {
                if ($i!=$j) {
                    if ($sameNumbers[$i]+$sameNumbers[$j] == $data['parameter']) {
                        $number_1 = $sameNumbers[$i];
                        $number_2 = $sameNumbers[$j];
                        $isSame = true;
                    }
                }
            }
        }

        if ($isSame) 
            $return = "TRUE, karena $number_1 + $number_2 = ".$data['parameter'];
        else 
            $return =  "FALSE, tidak ada pasangan yang dijumlah = ".$data['parameter'];
        return $return;

    }
}


