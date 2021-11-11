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
