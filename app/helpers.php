<?php

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

//DB表示確認用、現在未使用
function showTable($table) {
    $mat = DB::table($table)->get();

    foreach ($mat as $record) {
        print "<br>";
        foreach($record as $data) {
            printf("%s\t", $data);
        }
    }
}
