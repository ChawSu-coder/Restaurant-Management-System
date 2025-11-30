@extends('admin.maindesign')
@section('show_food')
<div class="container-fluid">
<table class="table table-dark table-bordered table-striped mt-4">
    <thead>
        <tr>
            <th class="col-lg-4">User Email</th>
            <th class="col-lg-4">Guest_Numbers</th>
            <th class="col-lg-2">Time</th>
            <th class="col-lg-2">Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($booked_tables as $booked_table )
            <tr>
                <td>{{$booked_table->email}}</td>
                <td>{{$booked_table->guest_numbers}}</td>
                <td>{{$booked_table->time}}</td>
                <td>{{$booked_table->date}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection