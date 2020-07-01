@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-5">Add Employee</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td>
                                        <a href="/employees/{{ $employee->id }}">{{ $employee->name }}</a>
                                    </td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        <a href="/companies/{{ $employee->company->id }}">{{ $employee->company->name }}</a>
                                    </td>
                                    <td class="d-flex">
                                        <a href="/employees/{{ $employee->id }}/edit" class="btn btn-sm btn-warning mr-1">Edit</a>
                                        <form method="POST" action="/employees/{{ $employee->id }}">
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
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
