@extends('includes.header')

@section('body')
    <form action="{{ route('saveAPOD') }}" method="POST">
    @csrf
        <div class="container justify-content-center bootstrap-grid text-light text-center mt-3">
            <div class="row" id="apod">
                <h2>Todays Astronomy Picture of the Day</h2>
            </div>
            <button type="submit" class="btn btn-warning btn-lg">SAVE!</button>
            <hr class="text-light">
        </div>
        
    </form>
    
    @if(count($fav_photos) >= 1)
        @foreach($fav_photos as $photo)
            <div class="container justify-content-center bootstrap-grid text-light text-center mt-3">
                <div class="row" id="apod_id_{{ $photo->apod_id }}">
                    <h2>{{ $photo->photo_date }}</h2>
                    <img src="{{ $photo->hdurl }}" class="w-100">
                    <small>copyright: {{$photo->copyright}}</small>
                    <p class="h6">{{ $photo->explanation }}</p>
                </div>
                <hr class="text-light">
            </div>
        @endforeach
    @endif





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

        let para = $('<h6>').text(apod_data.explanation);

        let copyright = $('<small>').text("copyright: " + apod_data.copyright).attr({
            class: "text-light"
        });

        let hdurl = $('<input>').attr({
            name: "hdurl",
            id: "hidden_hdurl",
            type: "hidden",
            value: apod_data.hdurl
        });
        let url = $('<input>').attr({
            name: "url",
            id: "hidden_url",
            type: "hidden",
            value: apod_data.url
        });
        let media_type = $('<input>').attr({
            name: "media_type",
            id: "hidden_media_type",
            type: "hidden",
            value: apod_data.media_type
        });
        let cpyright = $('<input>').attr({
            name: "copyright",
            id: "hidden_copyright",
            type: "hidden",
            value: apod_data.copyright
        });
        let title = $('<input>').attr({
            name: "title",
            id: "hidden_title",
            type: "hidden",
            value: apod_data.title
        });
        let desc = $('<input>').attr({
            name: "explanation",
            id: "hidden_description",
            type: "hidden",
            value: apod_data.explanation
        });
        let photo_date = $('<input>').attr({
            name: "photo_date",
            id: "hidden_date",
            type: "hidden",
            value: apod_data.date
        });

        let user_name = $('<input>').attr({
            name: "user_name",
            id: "hidden_user_name",
            type: "hidden",
            value: "{{$user->user_name}}"
        });

        $("#apod").append(date);
        $("#apod").append(img);
        $("#apod").append(copyright);
        $("#apod").append(para);
        $("#apod").append(desc);
        $("#apod").append(title);
        $("#apod").append(hdurl);
        $("#apod").append(url);
        $("#apod").append(media_type);
        $("#apod").append(cpyright);
        $("#apod").append(photo_date);
        $("#apod").append(user_name); 
    }

    get_apod(display_apod);
</script>

@endsection
