@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <h1>Welcome to Mini-CRM</h1>
                <p class="lead">Manage your companies and employees efficiently</p>
                
                <div class="row mt-5">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3>Companies</h3>
                                <p>Manage your business companies</p>
                                <a href="{{ route('companies.index') }}" class="btn btn-primary">
                                    View Companies
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3>Employees</h3>
                                <p>Manage company employees</p>
                                <a href="{{ route('employees.index') }}" class="btn btn-primary">
                                    View Employees
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection