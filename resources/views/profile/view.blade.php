@extends('layouts/master')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">

        <!-- Form -->
        <form>

          <div class="row justify-content-between align-items-center">
            <div class="col">
              <div class="row align-items-center">
                <div class="col-auto">

                  <!-- Avatar -->
                  <span class="avatar-image-wrapper">
                    <img alt="" class="avatar-image medium" src="/images/{{ Auth::user()->avatar }}">
                </span>

                </div>
                <div class="col ms-n2">

                  <!-- Heading -->
                  <h4 class="mb-1">
                    Your avatar
                  </h4>

                  <!-- Text -->
                  <small class="text-muted">
                    PNG or JPG no bigger than 600px wide and tall.
                  </small>

                </div>
              </div> <!-- / .row -->
            </div>
            <div class="col-auto">

              <!-- Button -->
              <button class="btn btn-sm btn-primary">
                Upload
              </button>

            </div>
          </div> <!-- / .row -->

          <!-- Divider -->
          <hr class="my-5">

          <div class="row">
            <div class="col-12 col-md-6">

              <!-- First name -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  First name
                </label>

                <!-- Input -->
                <input type="text" class="form-control">

              </div>

            </div>
            <div class="col-12 col-md-6">

              <!-- Last name -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  Last name
                </label>

                <!-- Input -->
                <input type="text" class="form-control">

              </div>

            </div>
            <div class="col-12">

              <!-- Email address -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Email address
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                  This contact will be shown to others publicly, so choose it carefully.
                </small>

                <!-- Input -->
                <input type="email" class="form-control">

              </div>

            </div>
            <div class="col-12 col-md-6">

              <!-- Phone -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  Phone
                </label>

                <!-- Input -->
                <input type="text" class="form-control mb-3" data-inputmask="'mask': '(999)999-9999'" inputmode="text">

              </div>

            </div>
            <div class="col-12 col-md-6">

              <!-- Birthday -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label">
                  Birthday
                </label>

                <!-- Input -->
                <input type="text" class="form-control flatpickr-input" data-flatpickr="" readonly="readonly">

              </div>

            </div>
          </div> <!-- / .row -->

          <!-- Button -->
          <button class="btn btn-primary">
            Save changes
          </button>

          <!-- Divider -->
          <hr class="my-5">

          <div class="row">
            <div class="col-12 col-md-6">

              <!-- Public profile -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Public profile
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                  Making your profile public means that anyone on the Dashkit network will be able to find you.
                </small>

                <div class="row">
                  <div class="col-auto">

                    <!-- Switch -->
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="switchOne">
                      <label class="form-check-label" for="switchOne"></label>
                    </div>

                  </div>
                  <div class="col ms-n2">

                    <!-- Help text -->
                    <small class="text-muted">
                      You're currently invisible
                    </small>

                  </div>
                </div> <!-- / .row -->
              </div>

            </div>
            <div class="col-12 col-md-6">

              <!-- Allow for additional Bookings -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Allow for additional Bookings
                </label>

                <!-- Form text -->
                <small class="form-text text-muted">
                  If you are available for hire outside of the current situation, you can encourage others to hire you.
                </small>

                <div class="row">
                  <div class="col-auto">

                    <!-- Switch -->
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="switchTwo" checked="">
                      <label class="form-check-label" for="switchTwo"></label>
                    </div>

                  </div>
                  <div class="col ms-n2">

                    <!-- Help text -->
                    <small class="text-muted">
                      You're currently available
                    </small>

                  </div>
                </div> <!-- / .row -->
              </div>

            </div>
          </div> <!-- / .row -->

          <!-- Divider -->
          <hr class="mt-4 mb-5">

          <div class="row justify-content-between">
            <div class="col-12 col-md-6">

              <!-- Heading -->
              <h4>
                Delete your account
              </h4>

              <!-- Text -->
              <p class="small text-muted mb-md-0">
                Please note, deleting your account is a permanent action and will no be recoverable once completed.
              </p>

            </div>
            <div class="col-auto">

              <!-- Button -->
              <button class="btn btn-danger">
                Delete
              </button>

            </div>
          </div> <!-- / .row -->

        </form>

        <br><br>

      </div>
    </div> <!-- / .row -->
  </div>
@endsection
 {{-- <img src="/storage/profile/{{$user->avatar}}" class="rounded-circle" alt="Cinque Terre" height="15%">
<h1 class="display-5 py-2 font-weight-bold">{{$user->name}}</h1> @if ($user->hasVerifiedEmail())
<i class="far fa-check-circle"></i> @endif
<div class="py-2">
    @if (Auth::user()->slug == $user->slug) @if ($user->location == null)
    <i class="fas fa-map-marked-alt py-3"> </i> <small class="text-muted">Please provide your Location</small> <br> @else
    <i class="fas fa-map-marked-alt py-3"> </i> <strong>{{$user->location}}</strong> <br> @endif
    <i class="far fa-envelope py-3"> </i> <strong class="text-muted"> <a href="mailto:{{$user->email}}">{{$user->email}}</a></strong>    <br> @if ($user->phone == null)
    <i class="fas fa-phone py-3"></i> <small class="text-muted">Please provide your phone number</small> <br> @else
    <i class="fas fa-phone py-3"></i> <strong>{{$user->phone}}</strong> <br> @endif @if ($user->website == null)
    <i class="fas fa-link py-3"></i> <small class="text-muted">Please provide your website address</strong> <br>
                            @else
                            <i class="fas fa-link py-3"></i> <strong>{{$user->website}}</strong> <br>
                        @endif
                        <a href="/profile/{{$user->slug}}/edit" class="btn btn-primary btn-block py-3"> Edit</a>
                    @else
                        @if ($user->location != null)
                        <i class="fas fa-map-marked-alt py-3"> </i> <strong>{{$user->location}}</strong> <br>
                        @endif
                        <i class="far fa-envelope py-3"> </i> <strong> <a href="mailto:{{$user->email}}">{{$user->email}}</a></strong> <br>
                        @if ($user->phone != null)
                        <i class="fas fa-phone py-3"></i> <strong>{{$user->phone}}</strong> <br>
                        @endif
                        @if ($user->website != null)
                        <i class="fas fa-link py-3"></i> <strong>{{$user->website}}</strong> <br>
                        @endif
                    @endif --}}
