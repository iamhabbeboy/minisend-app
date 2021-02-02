<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttachmentResource;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
     * Return attachment file path
     */
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
    /**
     * Update attachment id
     */
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
