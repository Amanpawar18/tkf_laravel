<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\TdsReport;
use App\Models\User;
use Illuminate\Http\Request;

class TdsReportController extends Controller
{
    public function index()
    {
        $tdsReports = TdsReport::paginate(10);
        return view('backend.tds-report.index', compact('tdsReports'));
    }

    public function create()
    {
        $tdsReport = new TdsReport();
        $users = User::all();
        return view('backend.tds-report.create', compact('users', 'tdsReport'));
    }

    public function store()
    {
        $data = request()->all();
        $data['period'] = $data['period_start'] . ' - ' . $data['period_end'];
        $data['user_id'] = User::whereEmail($data['user_email'])->first()->id;
        $tdsReport = TdsReport::create($data);
        $this->uploadTdsReport($tdsReport);
        return redirect()->route('admin.tds-report.index')->with('status', 'Tds Report stored successfully');
    }

    public function show(TdsReport $tdsReport)
    {
        return view('backend.tds-report.show', compact('tdsReport'));
    }

    public function edit(TdsReport $tdsReport)
    {
        $users = User::all();
        return view('backend.tds-report.edit', compact('users', 'tdsReport'));
    }

    public function update(TdsReport $tdsReport)
    {
        $data = request()->all();
        $data['period'] = $data['period_start'] . ' - ' . $data['period_end'];
        $tdsReport->update($data);
        $this->uploadTdsReport($tdsReport);
        return redirect()->route('admin.tds-report.index')->with('status', 'Tds Report updated successfully');
    }

    public function uploadTdsReport($tdsReport)
    {

        if (request()->hasFile('report')) {
            $tdsReportName = time() . '-' . uniqid() . '.' . request()->report->extension();
            $path = public_path('frontend/uploads/tdsReports/');
            request()->report->move($path, $tdsReportName);
            if (isset($tdsReport->tdsReport)) {
                Common::deleteExistingImage($tdsReport->tdsReport, $path);
            }
            $tdsReport->report = $tdsReportName;
            $tdsReport->save();
        }
    }


    public function destroy(TdsReport $tdsReport)
    {
        $path = public_path('frontend/uploads/tdsReports/');
        Common::deleteExistingImage($tdsReport->tdsReport, $path);
        $tdsReport->delete();
        return redirect()->route('admin.tds-report.index')->with('status', 'Tds Report deleted successfully');
    }
}
