<div class="sidenav" id="sidenav">
    <ul>
        <a href="{{route('homeBanner', app()->getLocale())}}"><li>{{ __('admin.homebanner') }}</li></a>
        <a href="{{route('newsAdmin', app()->getLocale())}}"><li>{{ __('admin.news') }}</li></a>
        <a href="{{route('about.edit', app()->getLocale())}}"><li>{{ __('admin.about') }}</li></a>
        <a href="{{route('privacy.edit', app()->getLocale())}}"><li>{{ __('admin.privacy') }}</li></a>
        <a href="{{route('pages.index', app()->getLocale())}}"><li>{{ __('admin.pages') }}</li></a>
        
    </ul>
    <ul class="bottom">
        <a href="{{route('newsletter.index', app()->getLocale())}}"><li>{{ __('admin.newsletter') }}</li></a>
        <a href="{{route('donations.read', app()->getLocale())}}"><li>{{ __('admin.donations') }}</li></a>
        <a href="{{route('users', app()->getLocale())}}"><li>{{__('admin.users')}}</li></a>
    </ul>
</div>

<script>
    let button = document.getElementById('menu');
    let menu = document.getElementById('sidenav');
    button.addEventListener('click',function(){
        menu.classList.toggle("show");
    });
</script>