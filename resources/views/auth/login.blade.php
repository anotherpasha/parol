@extends('admin.layouts.login')

@section('page-level-styles')

@endsection

@section('content')
    <section class="k-login uk-width-1-1 uk-cover-container">
        <img src="{!! asset('assets/img/admin/wilhelminabrug.jpg') !!}" alt="login" uk-cover>
        <div class="uk-overlay-primary uk-position-cover"></div>
        <div class="uk-overlay uk-position-center">
            <div class="uk-width-medium">
                <img class="uk-border-circle uk-align-center" src="{!! asset('assets/img/admin/favicon.png') !!}" width="72" height="72" alt="Login">
                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="uk-margin {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="uk-margin {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input id="password" type="password" class="uk-input" name="password" placeholder="Password" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="uk-flex uk-flex-middle uk-flex-between uk-margin">
                        <label class="uk-light">
                            <input class="uk-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                        <button type="submit" class="uk-button uk-button-primary">
                            Login
                        </button>
                    </div>
                    <ul class="uk-subnav uk-subnav-divider">
                        <li><a class="btn btn-link uk-text-capitalize" href="{{ route('password.request') }}">Forgot Your Password?</a></li>
                        {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                    </ul>
                </form>
            </div>
        </div>
        <footer class="k-footer uk-position-bottom uk-text-center">
            Copyright &copy; <?php echo date('Y'); ?> <a class="" href="{!! url('/') !!}" target="_blank" title="Site Name">Site Name</a> | Powered by <a class="" href="http://kleur.id" target="_blank" title="Kleur CMS">Kleur CMS</a>
        </footer>
    </section>
@endsection

@section('page-level-scripts')

@endsection
