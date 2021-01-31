<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EmailResource;
use App\Http\Controllers\AttachmentController;
use App\Models\Email;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EmailResource(Email::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttachmentController $attachment, Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'subject' => 'required',
            'recipient' => 'required',
        ]);

        $files = $attachment->getAttachmentPath(
            json_decode($request->attachmentId)
        );
        $emails = explode(',', $request->recipient);
        $emails = array_map('trim', $emails);
        $request->merge([
            "sender" => "info@gmail.com",
            "recipients" => $emails
         ]);
        dispatch(new SendEmailJob($files, $request->all()));
        Email::create($request->all());

        return new EmailResource($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
