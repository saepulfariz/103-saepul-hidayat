<?php

namespace App\Helpers;

class MyHelper
{
    public static function myFunction($arg = '')
    {
        // kode untuk function
        return "HELPER-" . $arg;
    }

    function getDatesFromRange($start, $end, $format = 'Y-m-d')
    {
        if ($start == $end) {
            $data[] = $start;
            return $data;
        }
        return array_map(
            function ($timestamp) use ($format) {
                return date($format, $timestamp);
            },
            range(strtotime($start) + ($start <= $end ? 4000 : 8000), strtotime($end) + ($start <= $end ? 8000 : 4000), 86400)
        );
    }
}
