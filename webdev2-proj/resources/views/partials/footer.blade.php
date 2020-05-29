<footer>
    <div class="container">
        <img src="{{asset('images/branding/jagex.png')}}" alt="Jagex logo">
        <p>
            {!! __('footer.footerText') !!} <a href="{{route('privacy', app()->getLocale())}}">{!! __('footer.privacyPolicy') !!}</a>
            {!! __('footer.footerText2') !!}
        </p>
    <a href="{{route('privacy', app()->getLocale())}}">{!! __('footer.privacyPolicy') !!}</a>
    </div>
</footer>
</body>

</html>
