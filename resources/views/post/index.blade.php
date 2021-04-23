@extends('layout.master')
@section('title', "Google Sheet Data")

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Google Sheet Data</h3>
            </div>
            <div class="card-body">
                <div class="table-responsvie">
                    <table class="table table-bordered">
                        <tr>
                            <th>SrNo.</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Age</th>
                        </tr>

                        @foreach ($sheetData as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item[0] }}</td>
                                <td>{{ $item[1] }}</td>
                                <td>{{ $item[2] }}</td>
                                <td>{{ $item[3] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection