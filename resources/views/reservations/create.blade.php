@extends('layouts.app')

@section('title', __('reservations.availability_request') . ' - ' . __('common.hotel_luxury'))

@section('content')
    <div class="hero">
        <div class="container">
            <h1>{{ __('reservations.availability_request') }}</h1>
            <p class="lead">{{ __('reservations.check_availability_subtitle') }}</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger"
                         role="alert">
                        <strong>{{ __('reservations.validation_failed') }}</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success"
                         role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="reservation-form">
                    <form action="{{ route('reservations.store') }}"
                          method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name"
                                           class="form-label">{{ __('reservations.first_name') }} *</label>
                                    <input type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           id="first_name"
                                           name="first_name"
                                           value="{{ old('first_name') }}"
                                           required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name"
                                           class="form-label">{{ __('reservations.last_name') }} *</label>
                                    <input type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           id="last_name"
                                           name="last_name"
                                           value="{{ old('last_name') }}"
                                           required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"
                                           class="form-label">{{ __('reservations.email') }} *</label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone"
                                           class="form-label">{{ __('reservations.phone') }} *</label>
                                    <input type="tel"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           id="phone"
                                           name="phone"
                                           value="{{ old('phone') }}"
                                           required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- room_type eliminado: el hotel confirma disponibilidad manualmente --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="check_in"
                                           class="form-label">{{ __('reservations.check_in') }} *</label>
                                    <input type="date"
                                           class="form-control @error('check_in') is-invalid @enderror"
                                           id="check_in"
                                           name="check_in"
                                           value="{{ old('check_in', $check_in ?? '') }}"
                                           required>
                                    @error('check_in')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="check_out"
                                           class="form-label">{{ __('reservations.check_out') }} *</label>
                                    <input type="date"
                                           class="form-control @error('check_out') is-invalid @enderror"
                                           id="check_out"
                                           name="check_out"
                                           value="{{ old('check_out', $check_out ?? '') }}"
                                           required>
                                    @error('check_out')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guests"
                                           class="form-label">{{ __('reservations.guests') }} *</label>
                                    <input type="number"
                                           class="form-control @error('guests') is-invalid @enderror"
                                           id="guests"
                                           name="guests"
                                           min="1"
                                           max="6"
                                           value="{{ old('guests', $guests ?? 1) }}"
                                           required>
                                    @error('guests')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country"
                                           class="form-label">{{ __('reservations.country') }} *</label>
                                    <input type="text"
                                           class="form-control @error('country') is-invalid @enderror"
                                           id="country"
                                           name="country"
                                           value="{{ old('country') }}"
                                           required>
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="special_requests"
                                   class="form-label">{{ __('reservations.special_requests') }}</label>
                            <textarea class="form-control"
                                      id="special_requests"
                                      name="special_requests"
                                      rows="4">{{ old('special_requests') }}</textarea>
                            <small class="text-muted">{{ __('reservations.special_requests_hint') }}</small>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input @error('terms') is-invalid @enderror"
                                   type="checkbox"
                                   id="terms"
                                   name="terms"
                                   {{ old('terms') ? 'checked' : '' }}
                                   required>
                            <label class="form-check-label"
                                   for="terms">
                                <a href="{{ route('condiciones') }}"
                                   target="_blank">{{ __('reservations.accept_terms') }}</a>*
                            </label>
                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-sm-flex">
                            <button type="submit"
                                    class="btn btn-primary btn-lg"
                                    style="background-color: #13662e">
                                {{ __('reservations.check_availability') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
