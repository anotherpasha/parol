@extends('admin.layouts.default')

@section('page-level-styles')
@endsection

@section('content')

    <h3>
        @if(isset($pageTitle)) {!! $pageTitle !!}@endif
    </h3>

    <form class="uk-form-stacked" action="{!! action('OptionsController@update') !!}" method="post">
        {!! csrf_field() !!}
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Registration Notification Emails</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="reg_emails"
                    type="text" placeholder="Emails..."
                    @if(isset($reg_emails)) value="{!! $reg_emails !!}" @endif>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Payment Notification Emails</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="payment_emails"
                    type="text" placeholder="Emails..."
                    @if(isset($payment_emails)) value="{!! $payment_emails !!}" @endif>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-text">Script Manager (Head)</label>
            <div class="uk-form-controls">
                <textarea class="uk-textarea" name="head_scripts" rows="5" placeholder="Scripts..">@if(isset($head_scripts)){!! $head_scripts !!}@endif</textarea>
            </div>
        </div>

        <div class="uk-flex uk-flex-middle uk-flex-between">
            <a href="{!! action('OptionsController@detail') !!}" class="uk-button uk-button-default">Back</a>
            <button type="submit" class="uk-button uk-button-primary">Save</button>
        </div>

    </form>

@endsection

@section('page-level-scripts')
@endsection
