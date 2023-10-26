@extends('includes.header')


@section('body')

<div class="container d-flex justify-content-center bootstrap-grid text-light text-center mt-3">
    <div class="col" id="apod">
        <h2>Todays Astronomy Picture of the Day</h2>
    </div>
</div>

@include('includes.scripts')
<script>
    function display_apod(apod_data) {
        let date = $('<h3>').text(apod_data.date);

        let img = $('<img />', {
            id: "apod_img",
            src: apod_data.hdurl,
            alt: "Astronomy picture of the day!",
            class: "w-100"
        });

        let copyright = $('<small>').text("copyright: " + apod_data.copyright).attr({
            class: "text-light"
        });

        let para = $('<h6>').text(apod_data.explanation);

        $("#apod").append(date);
        $("#apod").append(img);
        $("#apod").append(copyright);
        $("#apod").append(para);
        
    }

    get_apod(display_apod);
</script>


@endsection
