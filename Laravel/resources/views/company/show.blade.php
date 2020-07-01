@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Detail') }}</div>

                <div class="card-body">
                    <div class="d-flex flex-column align-items-center">
                        @if ($company->logo === 'default-logo.png')
                            <img src="{{ asset('img/default-logo.png') }}" alt="logo" style="width: 150px;">
                        @else
                            <img src="{{ asset('storage/company/' . $company->logo) }}" alt="logo" style="width: 150px;">
                        @endif
                        <div>
                            <p>Nama: {{ $company->name }}</p>
                            <p>Email: {{ $company->email }}</p>
                            <p>Website: <a href="http://{{ $company->website }}">{{ $company->website }}</a></p>
                            <div>
                                Employee:
                                    <ul>
                                        @foreach($company->employees as $employee)
                                            <li><a href="/employees/{{ $employee->id }}">{{ $employee->name }}</a></li>
                                        @endforeach
                                    </ul>
                            </div>
                        </div>

                        <div class="action d-flex mt-5">
                            <a href="{{ $company->id }}/edit" class="btn btn-warning mr-5">Edit</a>
                            <form method="POST" action="{{ $company->id }}">
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
