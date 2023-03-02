<?php



if(!function_exists('safePrint'))
{
    function safePrint(null|string $value,$valueFoPrint=null)
    {
        if(!empty($value) && !is_null($value))
            return $value;
        else
            return (!is_null($valueFoPrint)) ? $valueFoPrint : "مقداری یافت نشد";
    }
}


?>