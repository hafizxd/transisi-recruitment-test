@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-5">Add Company</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach($companies as $company)
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td>
                                        <img src="{{ asset('storage/company/' . $company->logo) }}" alt="logo" style="height: 30px; width: auto;">
                                    </td>
                                    <td>
                                        <a href="/companies/{{ $company->id }}">{{ $company->name }}</a>
                                    </td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <a href="http://{{ $company->website }}">{{ $company->website }}</a>
                                    </td>
                                    <td class="d-flex">
                                        <a href="/companies/{{ $company->id }}/edit" class="btn btn-sm btn-warning mr-1">Edit</a>
                                        <form method="POST" action="/companies/{{ $company->id }}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
