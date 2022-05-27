<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Session;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Application::all();
        return view('admin.applicationlist',compact('data'));
    }
    public function edit_index(Request $request, $id)
    {
        $data = Application::findOrFail($id);
 
        return view('admin.applicationinlab',compact('data'));
    }
    public function action(Request $request, $id){

        $data = Application::findOrFail($id);

        return view('admin.applicationinadmin',compact('data'));
    }
    public function view_index(Request $request, $id){

        $data = Application::findOrFail($id);
        return view('admin.applicationprintviwe',compact('data'));
    }
    public function cashier_view(Request $request, $id){
        $data = Application::findOrFail($id);
        return view('admin.applicationincashier',compact('data'));
    }

    public function edit(Request $request, $id){

        $data = Application::find($id);
        $data->serial_number = $request->input('number');
        $data->test_type = $request->input('test_type');
        $data->sample_type = $request->input('sample');
        $data->number_of_samples = $request->input('noofsamples');
        $data->pm_1 = $request->input('pm1');
        $data->pm_2 = $request->input('pm2');
        $data->pm_3 = $request->input('pm3');
        $data->pm_4 = $request->input('pm4');
        $data->re_1 = $request->input('re1');
        $data->re_2 = $request->input('re2');
        $data->re_3 = $request->input('re3');
        $data->re_4 = $request->input('re4');
        $data->minute = $request->input('minute');
        $data->status = $request->input('status');
        $data->save();
        
        Session::flash('edited','Application edited successfully.');

        return redirect('/applicationlist');
    }
    public function edit_action(Request $request, $id){

        $data = Application::find($id);
        $data->certificate_number = $request->input('certificate_no');
        $data->status = $request->input('status');

        $data->save();
        
        Session::flash('action_edited','Application edited successfully.');

        return redirect('/applicationlist');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = new Application;
        $data->serial_number = $request->input('snumber');
        $data->received_date = $request->input('date');
        $data->customer = $request->input('customer');
        $data->vat = $request->input('vat');
        $data->test_type = $request->input('testtype');
        $data->payment_amount = $request->input('amount');
        $data->sample_type = $request->input('sample');
        $data->number_of_samples = $request->input('noofsamples');
        $data->priority_type = $request->input('priority');
        $data->save();
        
        Session::flash('application','Application created successfully.');

        return redirect('/applicationlist');
    }

    public function pstatus(Request $request, $id){
        $data = Application::find($id);
        $data->payment_status = $request->input('pstatus');
        
        $data->save();
        
        Session::flash('pstatus','Status updated successfully.');

        return redirect('/applicationlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
