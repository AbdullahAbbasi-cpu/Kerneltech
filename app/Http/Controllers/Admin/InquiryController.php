<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
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
        $Inquiries = Inquiry::all();
        return view('admin.inquiry.index', compact('Inquiries'));
    }

    public function store(Request $request)
    {
        // check logo if exists        
    }

    public function show($id)
    {   
        $Inquiry = Inquiry::where('id',$id)->first();
        return view('admin.inquiry.show', compact('Inquiry'));
    }

    public function export()
    {
        $Inquiries = Inquiry::all();
        $csvFileName = 'inquiry.csv';
    
        $tempFilePath = tempnam(sys_get_temp_dir(), 'csv_');
        $handle = fopen($tempFilePath, 'w');
    
        fputcsv($handle, ['Sno', 'Emails']);
        $counter = 1;
        
        foreach ($Inquiries as $Inquiry) {
            fputcsv($handle, [$Inquiry, $Inquiry->email]);
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
