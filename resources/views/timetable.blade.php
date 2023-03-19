@extends('welcome')

@section('title', 'Page Title')


@section('content')

    <div class="album py-5 bg-light">
        <a href="/" class="btn btn-secondary my-2" style="margin: 5px">Back to Employees</a>
        <div class="container">

            <p class="text-center">
                <a href="/timetable/{{$employeeId}}/monday" class="btn @if ($day ==='Monday') btn-primary @else btn-secondary @endif my-2">Monday</a>
                <a href="/timetable/{{$employeeId}}/tuesday" class="btn @if ($day==='Tuesday') btn-primary @else btn-secondary @endif my-2">Tuesday</a>
                <a href="/timetable/{{$employeeId}}/wednesday" class="btn @if ($day==='Wednesday') btn-primary @else btn-secondary @endif my-2">Wednesday</a>
                <a href="/timetable/{{$employeeId}}/thursday" class="btn @if ($day==='Thursday') btn-primary @else btn-secondary @endif my-2">Thursday</a>
                <a href="/timetable/{{$employeeId}}/friday" class="btn @if ($day==='Friday') btn-primary @else btn-secondary @endif my-2">Friday</a>
            </p>
            <h2><b>Employee:</b> {{$employeeName}}</h2>
            <h2><b>Day:</b> {{$day}}</h2>
            @foreach($timetable as $class)
                <h3 style="margin: 30px 0"><b>Class Name:</b> {{$class->name}}</h3>
                <table class="table" style="width:100%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width:50%">First Name</th>
                        <th scope="col" style="width:50%">Last Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($class->students->data as $student)
                        <tr>
                            <td>{{$student->forename}}</td>
                            <td>{{$student->surname}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection
