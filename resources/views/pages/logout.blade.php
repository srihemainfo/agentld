{{-- Sign up  --}}
@include('welcome')

@section('page-Title', 'Sign IN')


@section('required_CSS')

@endsection


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- sign-in popup start -->
    <section class="container paper-container mts-70">

    </section>
    <!--  sign-in popup end -->
@endsection




@section('required_JS')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#profile-sign-out-btn').click(function() {

alert('asdsffgs');
        });
    });
</script>




@endsection
