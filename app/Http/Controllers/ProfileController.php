<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\ProfilesImport; 
use App\Exports\ProfileExport; 
use App\Profile;
use App\Employee;
use PDF;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function createPDF() { 
      // retreive all records from db 
      $data = Profile::all();
 
      // share data to view 
      view()->share('profile',$data); 
      $pdf = PDF::loadView('pdf1_view', $data); 
 
      // download PDF file with download method 
      return $pdf->download('pdf_file.pdf');
        }

     

     public function fileImport(Request $request)  
    { 
        Excel::import(new ProfilesImport, $request->file('file')->store('temp')); 
        return back(); 
    } 


public function fileExport()  
    { 

        
        return Excel::download(new ProfileExport, 'ProfileList.csv');//.csv



        }

    public function index()
    {
        

        $employees = DB::table('employees')->get();
       // $profiles = DB::table('profiles')->get();
        $profiles=Profile::with('employee')-> get();

        return view('profile', ['employees' => $employees,'profiles'=>$profiles]);
       

            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        //$data = $request->validate([
            //'position_name' => 'required|max:20',
        //]);
        
        $profile = new Profile();
        $profile->id=$request['pid'];
        $profile->employee_id = $request['id'];
        $profile->age = $request['age'];
        $profile->height = $request['height'];
        $profile->father_name = $request['father_name'];
        $profile->save();
        return redirect('/profile');  

        
        
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
        /**
         * undocumented constant
         **/
        //dd($id);
         $profiles=Profile::with('employee')->where('id','=',$id)->get();
        return view('employeeshow',compact('profiles')); 

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
