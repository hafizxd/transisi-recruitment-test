@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee Detail') }}</div>

                <div class="card-body">
                    <div class="d-flex flex-column align-items-center">
                        <p>
                            <p>Nama: {{ $employee->name }}</p>
                            <p>Email: {{ $employee->email }}</p>
                            <p>Company: <a href="/companies/{{ $employee->company->id }}">{{ $employee->company->name }}</a></p>
                        </div>

                        <div class="action d-flex justify-content-center mt-5">
                            <a href="{{ $employee->id }}/edit" class="btn btn-warning mr-5">Edit</a>
                            <form method="POST" action="{{ $employee->id }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
