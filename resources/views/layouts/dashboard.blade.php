@include("include/dashboard/first")
@include("include/dashboard/menu")
<!-- Layout container -->
<div class="layout-page">

    @include("include/dashboard/navbar")

    <div class="content-wrapper">
        @yield("content")
        @include("include/dashboard/footer")
    </div>
</div>

@include("include/dashboard/end")



