@extends('layout')

@section('title')
  確認画面
@stop

@section('context')
  <h1>フォーム>確認</h1>

  <p>
    名前：
    {{{ Input::get('name_first') }}}
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
      @endforeach

      @if ( in_array('その他', Input::get('hobby')) )
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
  
  {{ Form::open(array('url' => 'form/finish')) }}
    {{ Form::hidden('name_first', Input::get('name_first')) }}
    {{ Form::hidden('name_last', Input::get('name_last')) }}
    {{ Form::hidden('sex', Input::get('sex')) }}
    {{ Form::hidden('post_first', Input::get('post_first')) }}
    {{ Form::hidden('post_last', Input::get('post_last')) }}
    {{ Form::hidden('prefecture', Input::get('prefecture')) }}
    {{ Form::hidden('mail_address', Input::get('mail_address')) }}
    @if (empty(Input::get('hobby')) == false)
      @foreach (Input::get('hobby') as $hobby)
        {{ Form::hidden('hobby[]', $hobby) }}
      @endforeach
    @endif
    {{ Form::hidden('other_descript', Input::get('other_descript')) }}
    {{ Form::hidden('opinion', Input::get('opinion')) }}
    {{ Form::submit('送信') }}
  {{ Form::close() }}
  
  {{ Form::open(array('url' => 'form/form')) }}
    {{ Form::hidden('name_first', Input::get('name_first')) }}
    {{ Form::hidden('name_last', Input::get('name_last')) }}
    {{ Form::hidden('sex', Input::get('sex')) }}
    {{ Form::hidden('post_first', Input::get('post_first')) }}
    {{ Form::hidden('post_last', Input::get('post_last')) }}
    {{ Form::hidden('prefecture', Input::get('prefecture')) }}
    {{ Form::hidden('mail_address', Input::get('mail_address')) }}
    @if (empty(Input::get('hobby')) == false)
      @foreach (Input::get('hobby') as $hobby)
        {{ Form::hidden('hobby[]', $hobby) }}
      @endforeach
    @endif
    {{ Form::hidden('other_descript', Input::get('other_descript')) }}
    {{ Form::hidden('opinion', Input::get('opinion')) }}
    {{ Form::submit('戻る') }}
  {{ Form::close() }}
@stop
