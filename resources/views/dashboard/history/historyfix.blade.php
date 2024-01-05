@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My History</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>

    </div>
</div>

<div class="table-responsive col-lg-9">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Gender of Heir</th>
                <th scope="col">Status of Heir</th>
                <th scope="col">Month</th>
                <th scope="col">Total Assest</th>
                <th scope="col">Result of Calculation</th>

            </tr>
        </thead>
        <tbody>
            @foreach($heirs as $history)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $history->gender}}</td>
                <td>{{ $history->status}}</td>
                <td>{{ $history->month }}</td>
                <td>{{ $history->total_inheritance }}</td>
                <td>{{ $history->inheritance }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection