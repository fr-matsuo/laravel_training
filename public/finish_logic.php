<?php

$post_data = $_POST;

function addRecord($table, $name_first, $name_last, $email, $pref_id) {
    $record = array(
        //'pref_id'    => DB::table($table)->increment('pref_id'),
        'first_name' => $name_first,
        'last_name'  => $name_last,
        'email'      => $email,
        'pref_id'    => $pref_id,
        'created_at' => date("Y/m/d H:i:s", time()),
        'updated_at' => date("Y/m/d H:i:s", time())
    );

    DB::table($table)->insert($record);
}

function showTable($table) {
    $mat = DB::table($table)->get();

    foreach ($mat as $record) {
        print "<br>";
        foreach($record as $data) {
            printf("%s\t", $data);
        }
    }
}

addRecord('account_info', $post_data['name_first'], $post_data['name_last'], $post_data['mail_address'], $post_data['prefecture']);
