<?php

//セレクトボックスの配列は、表示されている値→要素・渡される値→キー っぽいので 渡したい値 => 表示する値
$PREFECTURES = array('--' => '--', '東京都' => '東京都', '埼玉県' => '埼玉県', '群馬県' => '群馬県');
$HOBBYS      = array('music' => '音楽鑑賞', 'movie' => '映画鑑賞', 'other' => 'その他');

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
