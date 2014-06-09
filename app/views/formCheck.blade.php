@extends('layout')

@section('title')
  確認画面
@stop

@section('context')
  <h1>フォーム>確認</h1>
  
  <form method="post">
    <p>
      名前：
      {{{ Input::get('name_first') }}}
      {{  ' ' }}
      {{{ Input::get('name_last') }}}
    </p>
    
    <p>
      性別:
      {{{ Input::get('sex') }}}
    </p>
    
    <p>
      郵便番号:
      {{{ Input::get('post_first') }}}
      {{  '-' }}
      {{{ Input::get('post_last') }}}
    </p>
    
    <p>
      都道府県:
      {{{ Input::get('prefecture') }}}
    </p>
    
    <p>
      メールアドレス:
      {{{ Input::get('mail_address') }}}
    </p>
    
    <p>
      趣味:
      @if ( empty(Input::get('hobby')) == false )
      
      @foreach (Input::get('hobby') as $hobby) 
      {{{ $hobby }}}
      {{  ' ' }}
      @endforeach

      @if ( in_array('other', Input::get('hobby')) )
      {{  '(' }}
      {{{ Input::get('other_descript') }}}
      {{  ')' }}
      @endif

      @endif
    </p>
    
    <p>
      ご意見:
      {{{ Input::get('opinion') }}}
    </p>
    
    <input type="hidden" name="name_first" value={{{Input::get('name_first')}}}>
    <input type="hidden" name="name_last" value={{{Input::get('name_last')}}}>
    <input type="hidden" name="sex" value={{{Input::get('sex')}}}>
    <input type="hidden" name="post_first" value={{{Input::get('post_first')}}}>
    <input type="hidden" name="post_first" value={{{Input::get('post_last')}}}>
    <input type="hidden" name="mail_address" value={{{Input::get('mail_address')}}}>

    <input type="submit" value="送信" formaction="finish">
    <input type="submit" value="戻る" formaction="form">
  </form>
@stop
