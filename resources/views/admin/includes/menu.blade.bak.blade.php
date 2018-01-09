<li ><a href="{!! route('admin') !!}"><span class="uk-margin-small-right" uk-icon="icon: home"></span> Dashboard</a></li>
<li class="uk-parent uk-open">
    <a href="#"><span class="uk-margin-small-right" uk-icon="icon: file-edit"></span> News</a>
    <ul class="uk-nav-sub">
        <li class="uk-active"><a href="{!! action('NewsController@index') !!}">All News</a></li>
        <li><a href="{!! action('NewsController@create') !!}">Create New</a></li>
    </ul>
</li>
<li class="uk-parent">
    <a href="#"><span class="uk-margin-small-right" uk-icon="icon: calendar"></span> Events</a>
    <ul class="uk-nav-sub">
        <li><a href="{!! action('EventController@index') !!}">All Event</a></li>
        <li><a href="{!! action('EventController@create') !!}">Create New</a></li>
    </ul>
</li>
<li class="uk-parent">
    <a href="#"><span class="uk-margin-small-right" uk-icon="icon: nut"></span> Products</a>
    <ul class="uk-nav-sub">
        <li><a href="{!! action('ProductController@index') !!}">All Product</a></li>
        <li><a href="{!! action('ProductController@create') !!}">Create New</a></li>
    </ul>
</li>
<li class="uk-parent">
    <a href="#"><span class="uk-margin-small-right" uk-icon="icon: video-camera"></span> Videos</a>
    <ul class="uk-nav-sub">
        <li><a href="{!! action('VideoController@index') !!}">All Videos</a></li>
        <li><a href="{!! action('VideoController@create') !!}">Create New</a></li>
    </ul>
</li>
<li class="uk-parent">
    <a href="#"><span class="uk-margin-small-right" uk-icon="icon: image"></span> Templates</a>
    <ul class="uk-nav-sub">
        <li><a href="{!! action('TemplateController@index') !!}">All Template</a></li>
        <li><a href="{!! action('TemplateController@create') !!}">Upload</a></li>
    </ul>
</li>
<li class="uk-parent">
    <a href="#"><span class="uk-margin-small-right" uk-icon="icon: paint-bucket"></span> Campaign</a>
    <ul class="uk-nav-sub">
        <li><a href="{!! action('CampaignController@participantIndex') !!}">Participants</a></li>
        <li><a href="{!! action('CampaignController@participantImages') !!}">Images</a></li>
    </ul>
</li>
{{--<li class="uk-nav-divider"></li>--}}
{{--<li class="uk-parent">--}}
    {{--<a href="#"><span class="uk-margin-small-right" uk-icon="icon: image"></span> Media</a>--}}
    {{--<ul class="uk-nav-sub">--}}
        {{--<li><a href="#">Images</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
<li class="uk-parent">
    <a href="#"><span class="uk-margin-small-right" uk-icon="icon: settings"></span> Setting</a>
    <ul class="uk-nav-sub">
        <li><a href="{!! action('PermissionController@index') !!}">Permission</a></li>
        <li><a href="{!! action('RoleController@index') !!}">Role</a></li>
        <li><a href="{!! action('UserController@index') !!}">User</a></li>
    </ul>
</li>