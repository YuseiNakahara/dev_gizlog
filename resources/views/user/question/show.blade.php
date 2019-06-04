@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <img src="{{ Auth::user()->avatar }}" class="avatar-img">
      <p>&nbsp;{{ Auth::user()->name }}さんの質問&nbsp;&nbsp;(&nbsp;&nbsp;)</p>
      <p class="question-date"></p>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $questions->title }}</td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'>{{ $questions->content }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    <div class="comment-list">
        <div class="comment-wrap">
          <div class="comment-title">
            <img src="{{ Auth::user()->avatar }}" class="avatar-img">
            <p></p>
            <p class="comment-date"></p>
          </div>
          <div class="comment-body"></div>
        </div>
    </div>
  <div class="comment-box">
    {!! Form::open(['route' => 'question.comment', 'method' => 'GET']) !!}
      <!-- <input name="user_id" type="hidden" value=""> -->
      {!! Form::input('hidden', 'user_id', Auth::id())!!}
      <!-- <input name="question_id" type="hidden" value=""> -->
      {!! Form::input('hidden', 'question_id', $questions['question_id']) !!}
      <div class="comment-title">
        <img src="{{ Auth::user()->avatar }}" class="avatar-img"><p>コメントを投稿する</p>
      </div>
      <div class="comment-body">
        <!-- <textarea class="form-control" placeholder="Add your comment..." name="comment" cols="50" rows="10"></textarea> -->
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Add your comment...']) !!}
        <span class="help-block">{{$errors->first('comment')}}</span>
      </div>
      <div class="comment-bottom">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
      </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection