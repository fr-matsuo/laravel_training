<?php
class FormController extends BaseController {
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
        return View::make('formCheck');
    }

    public function postFinish() {
        return View::make('finish');
    }
}
