@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-24" id="card_col">
            <div class="card w-75" id="messages">
                <div class="card-header">{{ __('Üzenetek') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ __('Lorem ipsum dolor sit amet') }}</li>
                        <li class="list-group-item">{{ __('Consectetur adipliscing elit') }}</li>
                        <li class="list-group-item">{{ __('Sed do eiusmod tempor incididunt ut labore') }}</li>
                        <li class="list-group-item">{{ __('Et dolore magna aliqua') }}</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
