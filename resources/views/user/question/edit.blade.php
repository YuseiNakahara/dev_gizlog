@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['question.updateconfirm', $questions->id], 'method' => 'GET']) !!}
      <div class="form-group {{ $errors->has('tag_category_id')? 'has-error' : '' }}">
        <select name='tag_category_id' class = "form-control selectpicker form-size-small" id ="pref_id">
          <option value="{{ $questions->id }}">{{ $questions->tagcategory->name }}</option>
          @foreach($tagcategory as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
      </div>
      <div class="form-group {{ $errors->has('tag_category_id')? 'has-error' : '' }}">
        {!! Form::input('text', 'title', $questions->title, ['class' => 'form-control', 'placehoder' => 'title']) !!}
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group {{ $errors->has('tag_category_id')? 'has-error' : '' }}">
        {!! Form::textarea('content', $questions->content, ['class' => 'form-control', 'placehoder' => 'Please write down your question here...']) !!}
        <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      {!! Form::submit('update', ['name' => 'confirm', 'class'  => 'btn btn-success pull-right'])!!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

