<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\User\CommentRequest;
use App\Models\Comment;
use App\Models\TagCategory;
use App\Http\Requests\User\QuestionsRequest;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    protected $questions;
    protected $tagcategory;
    protected $comments;

    public function __construct(Question $questions, TagCategory $tagcategory, Comment $comments)
    {
        $this->middleware('auth');
        $this->question = $questions;
        $this->category = $tagcategory;
        $this->comment = $comments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $question)
    {
        $questions = $this->question->all();
        $tagcategory = $this->category->all();
        return view('user.question.index', compact('questions', 'tagcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagcategory = $this->category->all();
        return view('user.question.create', compact('tagcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $this->question->create($inputs);
        return redirect()->to('question');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = $this->question->find($id);
        return view('user.question.show', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mypage()
    {
        return view('user.question.mypage');
    }

    public function confirm(QuestionsRequest $request)
    {
        $inputs = $request->all(); //カテゴリーid,Name,Contentが入っている
        // dd($inputs);
        $tagcategory = $this->category->find($inputs['tag_category_id'])->name;
        return view('user.question.confirm', compact('inputs','tagcategory'));
    }

    public function comment(QuestionsRequest $request)
    {
        $inputs = $request->all();
        $this->comment->create($inputs);
        return redirect()->to('question');
    }
}
