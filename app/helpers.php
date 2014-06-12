<?php

<<<<<<< HEAD:app/helpers.php
=======
$PREFECTURES = loadPrefectures();
$HOBBYS      = array('music' => '音楽鑑賞', 'movie' => '映画鑑賞', 'other' => 'その他');

>>>>>>> DBへの送信機能を実装 #43:public/form_logic.php
//inputにsearchが含まれていたらreturn、なければ''を返す
function getSelectedText($input, $search, $return) {
    //inputが配列の場合は要素毎に再帰処理
    if (is_array($input)) {
        foreach ($input as $input_value) {
            $return_text = getSelectedText($input_value, $search, $return);
            if (empty($return_text) == false) return $return_text;
        }
        return '';
    }

    if ($input === $search) return $return;

    return '';
}

function loadPrefectures() {
    $mat = DB::table('prefecture_info')->get();
    $retArray = array(0 => '--');
    foreach ($mat as $record) {
        $add = array($record->pref_id => $record->pref_name);
        $retArray = array_merge($retArray, $add);
    }

    return $retArray;
}
