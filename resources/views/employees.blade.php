@extends('welcome')

@section('title', 'Page Title')


@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Pick an Employee</h2>

            <h5>If no classes are available for an employee, you will not be able to view their timetable </h5>
            <div class="row">
                @foreach($employees as $employee)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <p class="card-text"><b>Class Name: </b>{{$employee->forename}} {{$employee->surname}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    @php
                                        $classroomCount = count($employee->classes->data)
                                    @endphp
                                    @if($classroomCount > 0)
                                        <a href="/timetable/{{$employee->id}}/monday">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>

                                    @else
                                        <button type="button" class="btn btn-sm btn-outline-secondary" disabled>View</button>
                                    @endif
                                </div>
                                <br><small class="text-muted">Classes available: {{$classroomCount}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
