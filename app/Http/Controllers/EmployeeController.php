<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use PDF;

class EmployeeController extends Controller
{
     public function showEmployees(){
      $employee = employees::all();
      return view('index', compact('employee'));
    }

    // Generate PDF
    public function createPDF() {
      // retreive all records from db
      $data = employees::all();

      // share data to view
      view()->share('employee',$data);
      $pdf = PDF::loadView('index', $data);

      // download PDF file with download method
      return $pdf->download('employees.pdf');
      
      // $pdf = PDF::loadView('pdf.invoice', $data);
	  // return $pdf->download('invoice.pdf');
  	}
}
