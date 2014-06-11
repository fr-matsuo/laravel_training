<?php

require_once('/home/ec2-user/public_html/laravel_training/public/formCheck_logic.php');


class FormController extends BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', ['on' => 'post']);
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
        return confirm();
    }

    public function postFinish() {
        return View::make('finish');
    }
}
