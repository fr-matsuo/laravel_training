<?php

class FormController extends BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function getIndex() {
        return View::make('index');
    }

    public function toForm($error_message = '') {
        $this->_shareItems();
        return View::make('form')->with('error_message', $error_message);
    }

    public function postFormcheck() {
        $this->_shareItems();
        
        $validator = AccountInfo::validation(Input::all());
        if($validator->fails()) {
            return Redirect::to('form/form')->withErrors($validator)->withInput();
        }
        return View::make('formCheck');
    }

    public function postFinish() {
        try {
            AccountInfo::addRecord(Input::all());
        } catch (Exception $e) {
            print $e->getMessage();
            return $this->toForm('データベースに登録できませんでした。');
        }
        return View::make('finish');
    }

    private function _shareItems() {
        $prefectures = PrefectureInfo::getArrayAsIdKey();
        $hobbys      = array('music' => '音楽鑑賞', 'movie' => '映画鑑賞', 'other' => 'その他');

        View::share('PREFECTURES', $prefectures);
        View::share('HOBBYS',      $hobbys);
    }
}
