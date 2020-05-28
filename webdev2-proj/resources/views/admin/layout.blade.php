@include('admin.partials.header')

<div class="content">
    <div class="admin">
        @include('admin.partials.navigation')
        <div class="admincontainer">
            @yield("content")
        </div>
    </div>
</div>

</body>
</html>