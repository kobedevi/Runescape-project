<div class="sidenav">
    <ul>
        <a href="{{route('homeBanner', app()->getLocale())}}"><li>{{ __('admin.homebanner') }}</li></a>
        <a href="{{route('newsAdmin', app()->getLocale())}}"><li>{{ __('admin.news') }}</li></a>
        <a href="{{route('about.edit', app()->getLocale())}}"><li>{{ __('admin.about') }}</li></a>
        <a href="{{route('privacy.edit', app()->getLocale())}}"><li>{{ __('admin.privacy') }}</li></a>
        <a href="{{route('donations.read', app()->getLocale())}}"><li>{{ __('admin.donations') }}</li></a>
    </ul>
</div>