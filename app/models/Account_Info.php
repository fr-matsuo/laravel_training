<?php

class Account_Info extends Eloquent {
    protected $table       = 'account_info';
    protected $primaryKey  = 'user_id';

    public static function validation($input_array) {
        $rules = array(
            'name_first'     => array('required', 'max:50'),
            'name_last'      => array('required', 'max:50'),
            'sex'            => array('required'),
            'post_first'     => array('required', 'digits:3'),
            'post_last'      => array('required', 'digits:4'),
            'prefecture'     => array('not_in:0'),
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

        if (!empty($input_array['hobby']) && in_array('その他', $input_array['hobby'])) {
            $add_rules    = array('other_descript'          => array('required'));
            $add_messages = array('other_descript.required' => 'その他の詳細を入力してください。');
            $rules    = array_merge($rules, $add_rules);
            $messages = array_merge($messages, $add_messages);
        }
        $validator = Validator::make($input_array, $rules, $messages);

        return $validator;
    }

    public static function addRecord($input_array) {
        $account_info = new Account_Info;

        $account_info->first_name = $input_array['name_first'];
        $account_info->last_name  = $input_array['name_last'];
        $account_info->email      = $input_array['mail_address'];
        $account_info->pref_id    = $input_array['prefecture'];

        $account_info->save();
    }
}
