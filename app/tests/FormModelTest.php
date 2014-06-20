<?php
class FormModelTest extends TestCase {
    
    //DBに登録済みのアカウントデータ
    private $_added_account_data = array(
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


    public function testValidation() {
        $input_value = array(
            //名前
            'name_first' => array(
                true  => array('good_name'), 
                false => array('', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
            ),
            'name_last'  => array(
                true  => array('good_name'),
                false => array('', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa')
            ),
            //性別
            'sex'        => array(
                true  => array('男性', '女性'),
                false => array('')
            ),
            //郵便番号
            'post_first' => array(
                true  => array('000'),
                false => array('00',  '0000',  '', '-000' )
            ),
            'post_last'  => array(
                true  => array('0000'),
                false => array('000', '00000', '', '-0000')
            ),
            //都道府県
            'prefecture' => array(
                true => array(
                     1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14, 15, 15, 17, 18, 19, 20,
                    21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
                    41, 42, 43, 44, 45, 46, 47
                ),
                false => array(0)
            ),
            //メールアドレス
            'mail_address' => array(
                true => array('good@sample.com'),
                false => array('bad@samle', 'bad', '@bad.com', '')
            ),
            //趣味
            'hobby' => array(
                true  => array(array('音楽鑑賞', '映画鑑賞'), array()),
                false => array(array('音楽鑑賞', 'その他'), array('その他'))
            ),
            //その他詳細
            'other_descript' => array(
                true  => array(''),
                false => array()
            ),
            //意見
            'opinion'        => array(
                true  => array('', 'opinion'),
                false => array()
            )
        );

        //input_value[true][0]をデフォルトとして、1つのみ他のデータにする
        foreach ($input_value as $column_name => $column) {
            foreach ($column as $isShouldBe =>  $data_array) {
                foreach ($data_array as $test_data) {
                    //テストデータ表示
                    if (!is_array($test_data)) {
                        printf("\nis %s :%s %s",$isShouldBe, $column_name, $test_data);
                    } else {
                        printf("\nis %s :%s ", $isShouldBe, $column_name);
                        foreach ($test_data as $array_data) {
                            printf("%s", $array_data);
                        }
                    }

                    //テスト
                    $this->_checkValidation($input_value, $column_name, $isShouldBe, $test_data);
                }
            }
            print "\n";
        }
    }

    private function _checkValidation($input_data, $test_column, $isShouldBe, $test_data) {
        $name_list = array(
            'name_first', 'name_last', 'sex', 'post_first', 'post_last',
            'prefecture','mail_address', 'hobby', 'other_descript', 'opinion'
        );

        $input = array();
        //inputのデフォルト値を入力
        foreach ($name_list as $column) {
            $input[$column] = $input_data[$column][true][0];
        }

        //テストデータ箇所を上書き
        $input[$test_column] = $test_data;

        $validator  = Account_Info::validation($input);
        $this->assertEquals($isShouldBe, !$validator->fails());
    }

    public function testAddRecord() {
        //追加済みのデータを追加しようとして
        try {
            Account_Info::addRecord($this->_added_account_data); 
        } catch (Exception $e) {
            return;
        }
        //追加できてしまったら失敗
        $this->fail();
    }
}
