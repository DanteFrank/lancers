<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use App\Client;
use App\Project;
use App\Invoice;
use App\Estimate;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        // return $user->projects;

        $invoices = $user->projects()->select('id', 'title', 'client_id')->with(['client:id,name', 'invoice:id,project_id,amount,status,issue_date,created_at'])->get();

        foreach ($invoices as $key => $invoice) {
            if($invoice->invoice == null){
                unset($invoices[$key]);
            }
        }
        // return $invoices;
        return view('invoices.invoicelist')->with('invoices', $invoices);
    }

    /**
     * Creates new record in the invoice table
     */
    public function store(Request $request){

        $this->validate($request, [
            'estimate_id' => 'required|numeric'
        ]);

        $estimate = Estimate::findOrFail($request->estimate_id);

        $pre_invoice = Invoice::where('estimate_id', $request->estimate_id)->first();

        if($pre_invoice !== null){

            $pre_invoice->update(['amount' => $estimate->estimate]);

            $invoice = $pre_invoice;
        }else{

            $invoice = Invoice::create(['project_id' => $estimate->project_id, 'estimate_id' => $estimate->id, 'amount' => $estimate->estimate]);
        }

        $invoice->project->client;
        $invoice->estimate = $estimate;

        // return $invoice;
        return view('invoices.reviewinvoice')->with('invoice', $invoice);
    }


    public function delete(Request $request, $invoice){
        $invoice = Invoice::findOrFail($invoice);

        $user = Auth::user();

        if($invoice->project->user_id !== $user->id){
            $request->session()->flash('error', "You're unauthorized to delete this invoice");
            return redirect()->back();
        }else{
            $request->session()->flash('status', 'Deleted');
            return redirect()->back();
        }
    }

    public function show($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);

        // dd($invoice);
        $project_id = $invoice->project_id;

        $invoice = Project::where('id', $project_id)->select('id','title', 'estimate_id', 'client_id')->with(['estimate', 'invoice', 'client'])->first();

        // return $invoice;
        return view('invoices.viewinvoice')->with('invoice', $invoice);
    }

    public function getPdf($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);

        $project_id = $invoice->project_id;

        $invoicex = Project::where('id', $project_id)->select('id','title', 'estimate_id', 'client_id')->with(['estimate', 'invoice', 'client'])->first();

            // dd("here");
            $pdf = PDF::loadView('invoice_view_pdf', [$data => $invoicex]);  


            return $pdf->download('lancers_invoice.pdf');
    }

    public function view($invoice_id){
        $invoice = Invoice::where(['id'=>$invoice_id, 'project_id' => Auth::user()->id])->first();
        return $invoice->count() > 0 ? $this->SUCCESS('Invoice retrieved', $invoice) : $this->SUCCESS('No invoice found');
    }
}
