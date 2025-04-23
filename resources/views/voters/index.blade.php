@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Voter List</h2>

    <table id="voterTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>State</th>
                <th>District</th>
                <th>Actions</th>
            </tr>
            <tr class="filters">
                <th><input type="text" class="form-control form-control-sm" placeholder="Search First Name" /></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Last Name" /></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search DOB" /></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Mobile" /></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Email" /></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search State" /></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search District" /></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($voters as $voter)
                <tr>
                    <td>{{ $voter->first_name }}</td>
                    <td>{{ $voter->last_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($voter->dob)->format('d-m-Y') }}</td>
                    <td>{{ $voter->mobile }}</td>
                    <td>{{ $voter->email }}</td>
                    <td>{{ $voter->state }}</td>
                    <td>{{ $voter->district }}</td>
                    <td>
                        <a href="{{ route('voters.show', $voter->slug) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
$(document).ready(function () {
    let table = $('#voterTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                title: 'Voter List',
                filename: 'voter_list'
            },
            {
                extend: 'excelHtml5',
                title: 'Voter List',
                filename: 'voter_list'
            },
            {
                extend: 'pdfHtml5',
                title: 'Voter List',
                filename: 'voter_list'
            },
            {
                extend: 'print',
                title: 'Voter List'
            }
        ],
        orderCellsTop: true,
        initComplete: function () {
            const api = this.api();
            api.columns().eq(0).each(function (colIdx) {
                if (colIdx < 5) {
                    $('input', $('.filters th').eq(colIdx)).on('keyup change', function () {
                        api.column(colIdx).search(this.value).draw();
                    });
                }
            });
        }
    });
});
</script>
@endsection




