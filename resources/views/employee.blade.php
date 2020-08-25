@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Employee</h1>
        </div>



        
        <div class="row">
            <div class="col-md-6">
                <form action="employee" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                        <input type="text" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name" placeholder="Employee Name" value="{{ old('employee_name') }}">
                        @error('employee_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="employee_name">Position</label>
                        <select name="id">
                            @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->position_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Employee Name" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" placeholder="Employee Name" value="{{ old('salary') }}">
                        @error('salary')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Add</button>
                </form>   
            </div>
            <div class="col-md-6">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                </form>


            </div>
            
             <div style="text-align: right;">

             <a class="btn btn-success" href="{{route('file-export')}}">Export data</a>

            </div>





        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                         <th>Employee Name</th>
                        <th>Position Id</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                             <td>{{ $employee->position['position_name']}}</td>
                             <td>{{ $employee->email }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>{{ $employee->updated_at }}</td>
                        </tr>
                    @endforeach
                           <a class="btn btn-primary" href="{{ URL::to('/employee/pdf') }}">Export to PDF</a> 

                </tbody>
            </table>
        </div>
       
    </div>
@endsection