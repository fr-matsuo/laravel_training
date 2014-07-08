<?php

class PrefectureInfo extends Eloquent {
    protected $table      = 'prefecture_info';
    protected $primaryKey = 'pref_id';

    public static function getArrayAsIdKey() {
        $mat = PrefectureInfo::all();

        $ret_array = array(0 => '--');
        foreach ($mat as $record) {
            $ret_array[$record->pref_id] = $record->pref_name;
        }

        return $ret_array;
        
    }
}
