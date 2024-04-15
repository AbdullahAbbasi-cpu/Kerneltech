<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Quote;

class FreeQuoteController extends Controller
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
        $freeQuote = Quote::all();
        return view('admin.free-quote.index', compact('freeQuote'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $freeQuote = Quote::where('id',$id)->first();
        return view('admin.free-quote.show', compact('freeQuote'));
    }

    public function export() {
        $freeQuote = Quote::all();
        $csvFileName = 'contacts.csv';
    
        $tempFilePath = tempnam(sys_get_temp_dir(), 'csv_');
        $handle = fopen($tempFilePath, 'w');
    
        fputcsv($handle, ['Sno', 'Emails']);
        $counter = 1;
        
        foreach ($freeQuote as $quote) {
            fputcsv($handle, [$counter, $quote->email]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
