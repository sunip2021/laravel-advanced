<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::get();
        $result = compact('employees');
        return view('emplist')->with($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addemp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'password' => 'required',
            'salary' => 'required|numeric',
            'dob' => 'required|date'
        ]);
        // dd($validator->fails());
        if ($validator->fails()) {
           
            return redirect()->route('employee.create')
                ->withErrors($validator)
                ->withInput();
        } else {
       
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['password']=$request->password;
            $data['salary']=$request->salary;
            $data['dob']=$request->dob;

            Employee::create($data);
            return redirect()->route('employee.index')->with('successmsg','Employee added successfully');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee=Employee::find($id);
        $result=compact('employee');
        return view('showemp')->with($result);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $employee=Employee::find($id);
        $result=compact('employee');
        return view('editemp')->with($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required'
        ]);
        if($validator->fails()) {

        } else {
             $update['name']=$request->name;
            $update['email']=$request->email;
            
            $update['salary']=$request->salary;
            $update['dob']=$request->dob;
            Employee::where('id',$id)
                ->update($update);
                 return redirect()->route('employee.index')->with('successmsg','Employee updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
