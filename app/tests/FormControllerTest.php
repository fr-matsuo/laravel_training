<?php

class FormControllerTest extends TestCase {
    private $_controller = null;

    private function _getController() {
        if($this->_controller == null) {
            $this->_controller = new FormController();
        }
        return $this->_controller;
    }

    //テストがなくて失敗するエラー回避用
    public function testDummy() {}
}
