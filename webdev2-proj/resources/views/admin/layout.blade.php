@include('admin.partials.header')

<div class="content">
    <div class="admin">
        @include('admin.partials.navigation')
        @yield("content")
    </div>
</div>

</body>
</html>