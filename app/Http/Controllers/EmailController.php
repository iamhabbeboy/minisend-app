<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EmailResource;
use App\Http\Controllers\AttachmentController;
use App\Models\Email;
use App\Jobs\SendEmailJob;
use Symfony\Component\Console\Input\Input;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return new EmailResource(
           Email::with('attachments')->orderBy('id', 'DESC')->paginate(10)
        );
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
            'sender' => 'required',
            'content' => 'required',
            'subject' => 'required',
            'recipient' => 'required',
        ]);
        $attachmentId = json_decode($request->attachmentId);
        $files = $attachment->getAttachmentPath($attachmentId);
        $emails = explode(',', $request->recipient);
        $emails = array_map('trim', $emails);
        $request->merge([
            "recipients" => $emails
         ]);

         $store = Email::create($request->all());
         $request->merge(["id" => $store->id ?? 0]);
         $attachment->updateMailAttachmentDetail($store->id ?? 0, $attachmentId);
        dispatch(new SendEmailJob($files, $request->all()));

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
        return new EmailResource(
            Email::with('attachments')->where(['id' => $id])->first()
        );
    }

    public function search(Request $request)
    {
        $query = $request->query->all();
        $searchTerm = $query['query'] ?? '';
        $status = $query['status'] ?? '';
        $response = Email::with('attachments');
        if(!empty($searchTerm)){
        $response->where('sender', 'like', '%' . $searchTerm . '%')
        ->orWhere('recipient', 'like', '%' . $searchTerm . '%')
        ->orWhere('subject', 'like', '%' . $searchTerm . '%');
        }
        if(!empty($status)) {
            $response->where('status', $status);
        }
        $data = $response->get();
        return new EmailResource($data);
    }
    /**
     * Get the recipient filter emails
     */
    public function recipientEmails(Request $request)
    {
        $query = $request->query->all();
        $email = $query['email'] ?? '';
        return new EmailResource(
            Email::with('attachments')
            ->where('recipient',  $email)->paginate(10)
        );
    }
    /**
     * Return the status stats
     */
    public function emailStat()
    {
        return new EmailResource(
            Email::groupBy('status')
            ->selectRaw('count(id) as total, status')
            ->get()
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Email::findOrFail($id);
        $find->delete();
        return new EmailResource($find);
    }
}
