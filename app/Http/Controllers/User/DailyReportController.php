<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DailyReportRequest;
use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyReportController extends Controller
    {
        protected $report;

        public function __construct(DailyReport $report)
    {
        $this->report = $report;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $report)
    {
        $userId = Auth::id();
        $inputs = $report->all();
        if(empty($inputs)) {
            $daily_report = $this->report->fetchAllPersonalReports($userId);
        } else {
            $daily_report = $this->report->fetchSearchingReports($userId, $inputs);
        }

        return view('user.daily_report.index', compact('daily_report', 'inputs'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(DailyReportRequest $request)
    {
        $inputs = $request->all();
        $this->report->create($inputs);
        return redirect()->to('daily_report');
    }

    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $daily_report = $this->report->find($id);
        return view('user.daily_report.show', compact('daily_report'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $daily_report = $this->report->find($id);
        return view('user.daily_report.edit', compact('daily_report'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(DailyReportRequest $report, $id)
    {
        $daily_report = $report->all();
        $this->report->find($id)->fill($daily_report)->save();
        return redirect()->route('daily_report.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $this->report->find($id)->delete();
        return redirect()->route('daily_report.index');
    }
    }
