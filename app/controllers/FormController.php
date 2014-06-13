<?php

class FormController extends BaseController {
    //セレクトボックスの配列は、表示されている値→要素・渡される値→キー っぽいので 渡したい値 => 表示する値
    public $PREFECTURES = array('--' => '--', '東京都' => '東京都', '埼玉県' => '埼玉県', '群馬県' => '群馬県');
    public $HOBBYS      = array('music' => '音楽鑑賞', 'movie' => '映画鑑賞', 'other' => 'その他');

    public function __construct() {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->share();
    }

    private function share() {
        View::share('PREFECTURES', $this->PREFECTURES);
        View::share('HOBBYS',      $this->HOBBYS);
    }

    public function getIndex() {
        return View::make('index');
    }

    public function getForm() {
        return View::make('form');
    }

    public function postForm() {
        return View::make('form');
    }

    public function postFormcheck() {
        return $this->confirm();
    }

    public function postFinish() {
        return View::make('finish');
    }

    function confirm() {
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

}
