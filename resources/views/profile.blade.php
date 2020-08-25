@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Profile</h1>
        </div>
        <div class="row">
            <div class=col-md-6><form action="profile" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>

                @endif
                 <div class="form-group">
                    <label for="pid">Id</label>
                    <input type="text" class="form-control @error('pid') is-invalid @enderror" id="pid" name="pid" placeholder="pid" value="{{ old('pid') }}">
                    @error('pid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                 <div class="form-group">
                    <label for="">Employee</label>
                    <select name="id">
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Age" value="{{ old('age') }}">
                    @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="height">Height</label>
                    <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" placeholder="Height" value="{{ old('height') }}">
                    @error('height')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="father_name">Father_name</label>
                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" placeholder="Father Name" value="{{ old('father_name') }}">
                    @error('father_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Add</button>
            </form></div>
            <div class=col-md-6>
                
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
                        <th>Id</th>
                         <th>Employee Id</th>
                        <th> Age</th>
                        <th>Height</th>
                        <th>Father Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td><a href="{{url('pro',$profile->id)}}">{{$profile->id}}</a></td>
                            <td>{{$profile->employee['name']}}</td>
                            <td>{{ $profile->age}}</td>
                            <td>{{ $profile->height }}</td>
                            <td>{{ $profile->father_name }}</td>
                            <td>{{ $profile->created_at }}</td>
                            <td>{{ $profile->updated_at }}</td>
                        </tr>

                    @endforeach
                    <a class="btn btn-primary" href="{{ URL::to('/profile/pdf') }}">Export to PDF</a> 
                </tbody>
            </table>
        </div>
    </div>
@endsection