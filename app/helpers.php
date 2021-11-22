<?php
if (!function_exists("searchable_lang")) {

    function searchable_lang($inputs, $search_by)
    {
        if(isset($inputs['filter'][$search_by])){
            $value = $inputs['filter'][$search_by];
            preg_match('/\p{Arabic}/u', $value)? $inputs['filter'][$search_by.'_ar'] = $value : $inputs['filter']['title_en'] = $value;
            unset($inputs['filter'][$search_by]);
        }
        return $inputs;
    }
}
if (!function_exists("number_in_page")) {

    function number_in_page($num = null)
    {
        $num = $num == null ? $num = 10 : $num;
        return $num;
    }
}
//Machine Normal filters ex:[category,subCategory,.....]
if (!function_exists("machines_filter")) {

    function machines_filter($q,$input,$field)
    {
        return $q->when( $input != null, function ($q) use ($input,$field) {
            return $q->filter(function ($item) use ($input,$field) { if($item->$field == $input )return true;});
        });
    }
}
//Machine Range filters ex:[price, years, hours]
if (!function_exists("machines_range_filter")) {

    function machines_range_filter($q,$min,$max,$field)
    {
        return $q->when( ( isset($min ) || isset($max) ) && ($min != null || $max != null) , function ($q) use ($min,$max,$field) {
            return $q->filter(function ($item) use ($min,$max,$field) { return $item->$field >= $min && $max >= $item->$field; });
        });
    }
}
