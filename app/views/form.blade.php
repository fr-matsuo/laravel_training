@extends('layout')

@section('title')
  フォーム画面
@stop

@section('context')
  <h1>フォーム>入力</h1>
  
  {{ Form::open(array('url' => 'form/formCheck')) }}
    
    <fieldset>
      <legend>フォーム</legend>
      
      {{ Form::label('name_label', '名前:') }}
      {{ Form::text('name_first', Input::get('name_first')) }}
      {{ Form::text('name_last', Input::get('name_last')) }}
      {{ $errors->first('name_first') }}
      {{ $errors->first('name_last') }}
      <br> 

      {{ Form::label('sex_label', '性別:') }}

      {{ Form::radio('sex', '男性', getSelectedText(Input::get('sex'), '男性', true)) }}
      {{ Form::label('sex_label', '男性') }}
      {{ Form::radio('sex', '女性', getSelectedText(Input::get('sex'), '女性', true)) }}
      {{ Form::label('sex_label', '女性') }}
      {{ $errors->first('sex') }}
      <br>

      {{ Form::label('post_label', '郵便番号:') }}
      {{ Form::text('post_first', Input::get('post_first')) }}
      {{ Form::text('post_last', Input::get('post_last')) }}
      @if (!empty($errors->first('post_first')))
          {{ $errors->first('post_first') }}
      @else
          {{ $errors->first('post_last') }}
      @endif
      <br>

      {{ Form::label('prefecture_label', '都道府県:') }}
      {{ Form::select('prefecture', $PREFECTURES, Input::get('prefecture')) }}
      {{ $errors->first('prefecture') }}
      <br>

      {{ Form::label('email_label', 'メールアドレス:')}}
      {{ Form::text('mail_address', Input::get('mail_address')) }}
      {{ $errors->first('mail_address') }}
      <br>

      {{ Form::label('hobby_label', '趣味:')}}
      @foreach ($HOBBYS as $hobby)
        {{ Form::checkbox('hobby[]', $hobby, getSelectedText(Input::get('hobby'), $hobby, true)) }}
        {{ Form::label('hobby_label', $hobby) }}
      @endforeach
      {{ Form::text('other_descript', Input::get('other_descript')) }}
      {{ $errors->first('other_descript') }}
      <br>

      {{ Form::label('opinion_label', 'ご意見:')}}
      {{ Form::text('opinion', Input::get('opinion')) }}
      <br>

      {{ Form::submit('確認') }}
    </fieldset>

  {{ Form::close() }}
@stop
