@extends('layouts.app')

@section('title', 'Companies')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Companies</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Company
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                        <tr>
                            <td>
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" 
                                         alt="{{ $company->name }}" 
                                         width="50" 
                                         height="50" 
                                         style="object-fit: cover;" class="rounded">
                                @else
                                    <div class="bg-secondary d-flex align-items-center justify-content-center rounded" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-building text-white"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email ?? 'N/A' }}</td>
                            <td>
                                @if($company->website)
                                    <a href="{{ $company->website }}" target="_blank">Visit</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('companies.show', $company) }}" 
                                       class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('companies.edit', $company) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('companies.destroy', $company) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No companies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $companies->links() }}
        </div> --}}
        @if($companies->hasPages())
        <div class="text-muted">
                    Showing {{ $companies->firstItem() }} to {{ $companies->lastItem() }} of {{ $companies->total() }} results
                </div>
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($companies->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $companies->previousPageUrl() }}" rel="prev">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($companies->getUrlRange(1, $companies->lastPage()) as $page => $url)
                        @if ($page == $companies->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($companies->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $companies->nextPageUrl() }}" rel="next">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        @endif
    </div>
</div>
@endsection