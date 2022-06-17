<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages   = ContactUs::latest()->paginate(10);
        return view('backend.contact-us.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactUsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactUs =  ContactUs::findOrFail($id);
        return view('backend.contact-us.show', ['contactUs' => $contactUs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactUsRequest  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactUsRequest $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactUs =  ContactUs::findOrFail($id);
        $contactUs->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', 'Message has been deleted successfully');
        return redirect()->back();
    }
}