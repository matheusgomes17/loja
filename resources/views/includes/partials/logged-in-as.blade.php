@if (session()->has("admin_user_id") && session()->has("temp_user_id"))
    <div class="alert alert-warning logged-in-as">
        {{ trans('alerts.frontend.currently-logged') }} {{ access()->user()->name }}. <a href="{{ route("auth.logout-as") }}">{{ trans('alerts.frontend.re-login') }} {{ session()->get("admin_user_name") }}</a>.
    </div><!--alert alert-warning logged-in-as-->
@endif