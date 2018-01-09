<div class="k-sidenav uk-overflow-auto">
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="duration: 300; transition: linear;">
        {{--@include('admin.includes.menu', array('items' => $g_menu->roots()))--}}

        <li>
            <a href="{!! backendUrl('dashboard') !!}">
                <span class="uk-margin-small-right" uk-icon="icon: home"></span> Dashboard
            </a>
        </li>

        <li class="uk-parent">
            <a href="javascript:;">
                <span class="uk-margin-small-right" uk-icon="icon: copy"></span> Pages
            </a>
            <ul class="uk-nav-sub" >
                <li>
                    <a href="{!! backendUrl('pages') !!}">Page List</a>
                </li>
                <li>
                    <a href="{!! backendUrl('pages/create') !!}">Add Page</a>
                </li>
            </ul>
        </li>

        <li class="uk-parent">
            <a href="javascript:;">
                <span class="uk-margin-small-right" uk-icon="icon: star"></span> Products
            </a>
            <ul class="uk-nav-sub" >
                <li>
                    <a href="">Product List</a>
                </li>
                <li>
                    <a href="">Add Product</a>
                </li>
            </ul>
        </li>

        <li class="uk-parent">
            <a href="javascript:;">
                <span class="uk-margin-small-right" uk-icon="icon: question"></span> FAQs
            </a>
            <ul class="uk-nav-sub" >
                <li>
                    <a href="{!! backendUrl('faq') !!}">FAQ List</a>
                </li>
                <li>
                    <a href="{!! backendUrl('faq/create') !!}">Add FAQ</a>
                </li>
            </ul>
        </li>

        <li class="uk-parent">
            <a href="javascript:;">
                <span class="uk-margin-small-right" uk-icon="icon: image"></span> Sliders
            </a>
            <ul class="uk-nav-sub" >
                <li>
                    <a href="">Slider List</a>
                </li>
                <li>
                    <a href="">Add Slider</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{!! backendUrl('registrants') !!}">
                <span class="uk-margin-small-right" uk-icon="icon: users"></span> Registrations
            </a>
        </li>

        <li>
            <a href="">
                <span class="uk-margin-small-right" uk-icon="icon: credit-card"></span> Payments
            </a>
        </li>

        <li>
            <a href="{!! backendUrl('claims') !!}">
                <span class="uk-margin-small-right" uk-icon="icon: bolt"></span> Claims
            </a>
        </li>

        <li class="uk-parent">
            <a href="javascript:;">
                <span class="uk-margin-small-right" uk-icon="icon: cog"></span> Settings
            </a>
            <ul class="uk-nav-sub" >
                <li>
                    <a href="{!! backendUrl('permissions') !!}">Permissions</a>
                </li>
                <li>
                    <a href="{!! backendUrl('roles') !!}">Roles</a>
                </li>
                <li>
                    <a href="{!! backendUrl('users') !!}">Users</a>
                </li>
                <li>
                    <a href="{!! backendUrl('options') !!}">Miscellaneous</a>
                </li>
            </ul>
        </li>

    </ul>
</div>
