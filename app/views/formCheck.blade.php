@extends('layout')

@title
    確認画面
@stop

@section('context')
  <h1>フォーム>確認</h1>
  
  <form method="post">
    <p>名前：山田太郎</p>
    
    <p>性別:男性</p>
    
    <p>郵便番号:150-0002</p>
    
    <p>都道府県:東京都</p>
    
    <p>メールアドレス:test@fact-real.com</p>
    
    <p>趣味:その他(サッカー)</p>
    
    <p>ご意見:よろしくお願いします</p>
    
    <input type="submit" value="送信" formaction="http://ec2-54-248-253-82.ap-northeast-1.compute.amazonaws.com/form_finish">
    <input type="submit" value="戻る" formaction="http://ec2-54-248-253-82.ap-northeast-1.compute.amazonaws.com/form_form">
  </form>
@stop
