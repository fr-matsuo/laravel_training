<?php

function confirm() {
    $name_first     = Input::get('name_first');
    $name_last      = Input::get('name_last');
    $sex            = Input::get('sex');
    $post_first     = Input::get('post_first');
    $post_last      = Input::get('post_last');
    $prefecture     = Input::get('prefecture');
    $mail_address   = Input::get('mail_address');
    $hobby          = Input::get('hobby');
    $other_descript = Input::get('other_descript');
    $opinion        = Input::get('opinion');

    $rules = array(
        'name_first'     => array('required', 'max:50'),
        'name_last'      => array('required', 'max:50'),
        'sex'            => array('required'),
        'post_first'     => array('required', 'digits:3'),
        'post_last'      => array('required', 'digits:4'),
        'prefecture'     => array("not_in:--"),
        'mail_address'   => array('required', 'email')
    );

    $messages = array(
        'name_first.required'   => '姓を入力してください。',
        'name_first.max'        => '姓は50文字以内で入力してください。',
        'name_last.required'    => '名を入力してください。',
        'name_last.max'         => '名は50文字以内で入力してください。',
        'sex.required'          => '性別を選択してください。',
        'post_first.required'   => '郵便番号を入力してください',
        'post_first.digits'     => '郵便番号を正しく入力してください。',
        'post_last.required'    => '郵便番号を入力してください。',
        'post_last.digits'      => '郵便番号を正しく入力してください。',
        'prefecture.not_in'     => '都道府県を選択してください。',
        'mail_address.required' => 'メールアドレスを入力してください',
        'mail_address.email'    => 'メールアドレスを正しく入力してください'
    );

    if (!empty(Input::get('hobby')) && in_array('その他', Input::get('hobby'))) {
        $add_rules    = array('other_descript'          => array('required'));
        $add_messages = array('other_descript.required' => 'その他の詳細を入力してください。');
        $rules    = array_merge($rules, $add_rules);
        $messages = array_merge($messages, $add_messages);
    }
    $validator = Validator::make(Input::all(), $rules, $messages);

    if ($validator->fails()) {
        return Redirect::to('form/form')->withErrors($validator)->withInput();
    }

    return View::make('formCheck');
}

//confirm();
