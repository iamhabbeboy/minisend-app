<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttachmentResource;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        // $request->validate([
        //     'attachment' => 'required|file|image|size:1024',
        // ]);
        $response = [];
        $path = '/attachments/';
        foreach($request->attachments as $file) {
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path($path), $name);
            $store = Attachment::create([
                'mail_id' => '0',
                'file_path' => $path . $name
            ]);
            $response[] = $store->id ?? 0;
        }

        return new AttachmentResource($response);
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

    public function getAttachmentPath($attachmentId)
    {
        $response = [];
        foreach($attachmentId as $id) {
            if(!empty($id)) {
                $data = Attachment::findOrFail($id);
                $response[] = public_path() . $data->file_path;
            }
        }
        return $response;
    }

    public function updateMailAttachmentDetail($mailId, $attachmentId)
    {
        foreach($attachmentId as $id) {
            if(!empty($id)) {
                $data = Attachment::findOrFail($id);
                $data->mail_id = $mailId;
                $data->save();
            }
        }
    }
}
