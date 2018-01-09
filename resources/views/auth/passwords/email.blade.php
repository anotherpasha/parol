@extends('admin.layouts.login')

@section('page-level-styles')

@endsection

@section('content')
    <section class="k-login uk-width-1-1 uk-cover-container">
        <img src="{!! asset('assets/img/admin/wilhelminabrug.jpg') !!}" alt="login" uk-cover>
        <div class="uk-overlay-primary uk-position-cover"></div>
        <div class="uk-overlay uk-position-center uk-width-1-3@m">
            <h3 class="uk-text-center uk-text-lead" style="color:white;">Reset Password</h3>
            <!-- <img class="uk-border-circle uk-align-center" src="{!! asset('assets/img/admin/favicon.png') !!}" width="72" height="72" alt="Login"> -->
            @if (session('status'))
                <div class="uk-alert uk-alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
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

                <div class="uk-margin uk-text-center">
                    <button type="submit" class="uk-button uk-button-primary">
                        Send Password Reset Link
                    </button>
                </div>

                <div class="uk-margin uk-text-center">
                    <a href="/login">Back to Login Page</a>
                </div>
            </form>
        </div>
        <footer class="k-footer uk-position-bottom uk-text-center">
            Copyright &copy; <?php echo date('Y'); ?> <a class="" href="{!! url('/') !!}" target="_blank" title="Site Name">Site Name</a> | Powered by <a class="" href="http://kleur.id" target="_blank" title="Kleur CMS">Kleur CMS</a>
        </footer>
    </section>
@endsection
