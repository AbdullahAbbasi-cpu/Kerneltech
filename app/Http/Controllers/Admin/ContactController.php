<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Contacts = Contact::all();
        return view('admin.contact.index', compact('Contacts'));
    }

    public function store(Request $request)
    {
        // check logo if exists        
    }

    public function show($id)
    {   
        $Contact = Contact::where('id',$id)->first();
        return view('admin.contact.show', compact('Contact'));
    }

    public function export()
    {
        $contacts = Contact::all();
        $csvFileName = 'contacts.csv';
    
        $tempFilePath = tempnam(sys_get_temp_dir(), 'csv_');
        $handle = fopen($tempFilePath, 'w');
    
        fputcsv($handle, ['Sno', 'Emails']);
        $counter = 1;
        
        foreach ($contacts as $contact) {
            fputcsv($handle, [$counter, $contact->email]);
            $counter++;
        }
    
        fclose($handle);
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];
        $fileContent = file_get_contents($tempFilePath);
        unlink($tempFilePath);
    
        return response($fileContent, 200, $headers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateSiteSettingRequest $request, $id)
    {
        // check logo if exists        
    }

    public function destroy(UpdateSiteSettingRequest $request, $id)
    {
        // check logo if exists        
    }
}
