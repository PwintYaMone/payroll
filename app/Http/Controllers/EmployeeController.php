<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Employee;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\EmployeesImport; 
use App\Exports\EmployeesExport; 
use PDF; 

class EmployeeController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function createPDF() { 
      // retreive all records from db 
      $data = Employee::all();
 
      // share data to view 
      view()->share('employee',$data); 
      $pdf = PDF::loadView('pdf_view', $data); 
 
      // download PDF file with download method 
      return $pdf->download('pdf_file.pdf');
        }
      public function fileImport(Request $request)  
    { 
        Excel::import(new EmployeesImport, $request->file('file')->store('temp')); 
        return back(); 
    } 


public function fileExport()  
    { 

        
        return Excel::download(new EmployeesExport, 'EmployeeList.xlsx');//.csv



        }


    public function index(){
            $employees = Employee::with('position')->get();


            $positions = DB::table('positions')->get();
        //$employees = DB::table('employees')->paginate(5);
        return view('employee', ['positions' => $positions,'employees'=>$employees]);

            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$data = $request->validate([
             //'name' =>'required|unique:departments|max:20',
        // ]);
        $employee = new Employee();
        $employee->name = $request['employee_name'];
        $employee->email= $request['email'];
        $employee->salary = $request['salary'];
        $employee->position_id = $request['id'];
        $employee->save();
        return redirect('/employee');  

            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
