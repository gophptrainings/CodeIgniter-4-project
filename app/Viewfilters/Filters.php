<?php

namespace App\Viewfilters;

class Filters {
   public static function hideNumbers(string $value, int $display = 4): string
   {
        $txt = '';
        for($i = 0; $i < strlen($value); $i++)
        {
            if($i < $display)
            {
                $txt .= $value[$i];
            }
            else
            {
                $txt .= "X";
            }
        }
        return $txt;
   }
}
