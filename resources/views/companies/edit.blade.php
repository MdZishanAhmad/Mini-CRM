@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Company</h1>
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Company Name *</label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $company->name) }}" 
                       required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email', $company->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo (min 100x100px)</label>
                @if($company->logo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $company->logo) }}" 
                             alt="{{ $company->name }}" 
                             width="100" 
                             class="rounded" 
                             style="object-fit: cover;">
                    </div>
                @endif
                <input type="file" 
                       class="form-control @error('logo') is-invalid @enderror" 
                       id="logo" 
                       name="logo"
                       accept="image/*">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="url" 
                       class="form-control @error('website') is-invalid @enderror" 
                       id="website" 
                       name="website" 
                       value="{{ old('website', $company->website) }}"
                       placeholder="https://example.com">
                @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Update Company</button>
            </div>
        </form>
    </div>
</div>
@endsection