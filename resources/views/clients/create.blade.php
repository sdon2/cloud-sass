@extends('cloud-sass::layouts.app')

@section('title', 'Create Client')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Client') }}
                    </div>

                    <div class="card-body">
                        <div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('cloud-sass.clients.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="name" class="form-label">Client Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            id="name" name="name" required>
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="short_name" class="form-label">Short Name</label>
                                        <input type="text" class="form-control" value="{{ old('short_name') }}"
                                            id="short_name" name="short_name" required>
                                        @error('short_name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{ old('email') }}"
                                            id="email" name="email" required>
                                        @error('email')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" value="{{ old('phone') }}"
                                            id="phone" name="phone" required>
                                        @error('phone')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="subdomain" class="form-label">Subdomain</label>
                                        <input type="text" class="form-control" id="subdomain"
                                            value="{{ old('subdomain') }}" name="subdomain" required>
                                        @error('subdomain')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="subscription_id" class="form-label">Subscription</label>
                                        <select class="form-control" id="subscription_id" name="subscription_id" required>
                                            <option value="">Select Subscription</option>
                                            @foreach ($subscriptions as $subscription)
                                                <option value="{{ $subscription->id }}"
                                                    {{ old('subscription_id') == $subscription->id ? 'selected' : '' }}>
                                                    {{ $subscription->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subscription_id')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="is_active" class="form-label">Is Active</label>
                                        <select class="form-control" id="is_active" name="is_active" required>
                                            @foreach ($active_statuses as $active_status)
                                                <option value="{{ $active_status }}"
                                                    {{ old('is_active') == $active_status ? 'selected' : '' }}>
                                                    {{ $active_status ? 'Active' : 'Inactive' }}</option>
                                            @endforeach
                                        </select>
                                        @error('is_active')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 align-content-end">
                                        <button type="submit" class="btn btn-primary mt-4">Create Client</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
