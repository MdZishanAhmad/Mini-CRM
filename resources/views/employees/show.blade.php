@extends('layouts.app')

@section('title', $employee->full_name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Employee Details</h1>
    <div>
        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h3>{{ $employee->full_name }}</h3>
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">First Name:</th>
                        <td>{{ $employee->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td>{{ $employee->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Company:</th>
                        <td>
                            <a href="{{ route('companies.show', $employee->company) }}">
                                {{ $employee->company->name }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $employee->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $employee->phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Created:</th>
                        <td>{{ $employee->created_at->format('M d, Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection