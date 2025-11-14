@extends('layouts.app')

@section('title', $company->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Company Details</h1>
    <div>
        <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" 
                         alt="{{ $company->name }}" 
                         class="img-fluid rounded" 
                         style="max-height: 200px;">
                @else
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                         style="height: 200px;">
                        <i class="fas fa-building text-white" style="font-size: 4rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h3>{{ $company->name }}</h3>
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Email:</th>
                        <td>{{ $company->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Website:</th>
                        <td>
                            @if($company->website)
                                <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Employees:</th>
                        <td>{{ $company->employees->count() }}</td>
                    </tr>
                    <tr>
                        <th>Created:</th>
                        <td>{{ $company->created_at->format('M d, Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@if($company->employees->count() > 0)
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Employees</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company->employees as $employee)
                            <tr>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->email ?? 'N/A' }}</td>
                                <td>{{ $employee->phone ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection