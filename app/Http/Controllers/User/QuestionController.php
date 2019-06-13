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
    public function index(Request $request)
    {
        $inputs = $request->all();
        $tagcategory = $this->category->all();

        if (array_key_exists('searchword', $inputs)) {
            $questions = $this->question->SearchingWord($inputs);
        } else {
            $questions = $this->question->all();
        }

        return view('user.question.index', compact('inputs', 'questions', 'tagcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inputs = $request->all();
        $tagcategory = $this->category->all();
        return view('user.question.create', compact('tagcategory', 'inputs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $inputs = $request->all();
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
        $question = $this->question->find($id);
        // dd($question);
        $comments = $question->comments->all();
        // dd($comments);
        return view('user.question.show', compact('question', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $tagcategory = $this->category->all();
        $questions = $this->question->find($id);
        // dd($questions);
        return view('user.question.edit', compact('tagcategory', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request, $id)
    {
        // dd($id); confirmになっている
        $inputs = $request->all();
        // dd($inputs);
        $this->question->find($id)->fill($inputs)->save();
        return redirect()->to('question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->question->find($id)->delete();
        return redirect()->to('question');
    }

    public function mypage(Request $question)
    {
        $questions = $this->question->all();
        $tagcategory = $this->category->all();
        return view('user.question.mypage', compact('questions', 'tagcategory'));
    }

    public function createconfirm(Request $request)
    {
        $inputs = $request->all();
        $question = $this->question->all();
        return view('user.question.confirm', compact('inputs', 'question'));
    }


    public function updateconfirm(Request $request, $id)
    {
        $inputs = $request->all();
        $question = $this->question->find($id);
        return view('user.question.confirm', compact('inputs','question'));
    }

    public function comment(CommentRequest $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $this->comment->create($inputs);
        return redirect()->back();
    }
}
