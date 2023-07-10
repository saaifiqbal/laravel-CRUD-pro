@extends('Layout.main')

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Add New Contact</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                @include('contacts._form')
        `                   </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('title', 'Contact App | Create Contact')
{{--<a href="{{ route("contact.index") }}" > Contact Page</a>
<a href="{{ route("contact.show", 1) }}" > Contact Data PagePage</a>--}}
