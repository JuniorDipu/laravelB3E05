@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Contacts</div>

                    <div class="card-body">
                        <form action="{{ route('contacts.index') }}" method="get">
                            <div class="form-group">
                                <input type="text" name="search" placeholder="Search...">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                        < class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact }}</td>
                                    </tr>
                                @endforeach


                        @endsection


