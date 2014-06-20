<?php

class FormControllerTest extends TestCase {

    public function testNormalAction() {
       $response = $this->action('GET', 'FormController@getIndex');
    }

    public function testErrorValidation() {
        $illegal_input = array(
            'name_first'     => '',
            'name_last'      => '',
            'sex'            => '',
            'post_first'     => '',
            'post_last'      => '',
            'mail_address'   => '',
            'hobby'          => array(),
            'other_descript' => '',
            'opinion'        => ''
        );

        $response = $this->action('POST', 'FormController@postFormcheck', array(), $illegal_input);
        $this->assertRedirectedTo('form/form');
    }

    public function testErrorAddRecord() {
        //DBに登録済みのアカウントデータ
        $added_account_data = array(
            'name_first'     => 'add',
            'name_last'      => 'record',
            'sex'            => '男性',
            'post_first'     => '000',
            'post_last'      => '0000',
            'mail_address'   => 'test@data.com',
            'prefecture'     => 44,
            'other_descript' => '',
            'opinion'        => ''
        );
        
        $response = $this->action('POST', 'FormController@postFinish', array(), $added_account_data);
        $this->assertEquals('form', $response->original->getName());
    }
}
