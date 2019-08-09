@extends('auth.app')
@section('content')
@if (isset($status))
<div class="alert alert-success">
    {!! $status !!}
</div>
<p>{{ __('message.check-email-notice') }}</p>
<span>{{ __('auth.dont-have-email').'? ' }}</span><a href="{{ route('home') }}">{{ __('auth.resend') }}</a>
@endif
@endsection
