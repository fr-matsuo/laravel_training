<?php

class FormControllerTest extends TestCase {

    public function testNormalAction() {
        $right_input = array(
            'name_first'     => 'nameFirst',
            'name_last'      => 'nameLast',
            'sex'            => '男性',
            'post_first'     => '000',
            'post_last'      => '1111',
            'prefecture'     => 1,
            'mail_address'   => 'no@signed.com',
            'hobby'          => array('音楽鑑賞'),
            'other_descript' => '',
            'opinion'        => ''
        );

        $response = $this->action('GET', 'FormController@getIndex');
        $this->assertEquals('index', $response->original->getName());

        $response = $this->action('GET', 'FormController@toForm');
        $this->assertEquals('form', $response->original->getName());

        $response = $this->action('POST', 'FormController@toForm', array(), $right_input);
        $this->assertEquals('form', $response->original->getName());

        $response = $this->action('POST', 'FormController@postFormcheck', array(), $right_input);
        $this->assertEquals('formCheck', $response->original->getName());

        $response = $this->action('POST', 'FormController@postFinish', array(), $right_input);
        $this->assertEquals('finish', $response->original->getName());
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

        $response = $this->action('POST', 'FormController@postFormcheck', $illegal_input);
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
        
        $response = $this->action('POST', 'FormController@postFinish', $added_account_data);
        $this->assertEquals('form', $response->original->getName());
    }
}
