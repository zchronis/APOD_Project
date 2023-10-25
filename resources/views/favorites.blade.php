@extends('includes.header')

@section('body')

    <p>{{$user->user_name}}</p>
    @if(count($fav_photos) > 1)
        @foreach($fav_photos as $photo)
            <img src="{{$photo->hdurl}}">
        @endforeach
    @endif

    <form action="{{route('saveAPOD')}}" method="POST">
    @csrf
        <div class="apod" id="apod">
        </div>
        <button type="submit">SAVE!</button>
    </form>

    <script>
        axios.get("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY")
        .then(function(response) {
            console.log(response);
            let img = $('<img />', {
                id: "apod_img",
                src: response.data.hdurl,
                alt: "Astronomy picture of the day!",
                width: 300
            });
            let para = $('<p>').text(response.data.explanation).attr({
                style: "color:white;"
            });

            let hdurl = $('<input>').attr({
                name: "hdurl",
                id: "hidden_hdurl",
                type: "hidden",
                value: response.data.hdurl
            });
            let copyright = $('<input>').attr({
                name: "copyright",
                id: "hidden_copyright",
                type: "hidden",
                value: "all copyrights belong to their respective owners"
            });
            let title = $('<input>').attr({
                name: "title",
                id: "hidden_title",
                type: "hidden",
                value: response.data.title
            });
            let desc = $('<input>').attr({
                name: "explanation",
                id: "hidden_description",
                type: "hidden",
                value: response.data.explanation
            });
            let date = $('<input>').attr({
                name: "photo_date",
                id: "hidden_date",
                type: "hidden",
                value: response.data.date
            });

            let user_name = $('<input>').attr({
                name: "user_name",
                id: "hidden_user_name",
                type: "hidden",
                value: "{{$user->user_name}}"
            });

            $("#apod").append(img);
            $("#apod").append(para);
            $("#apod").append(desc);
            $("#apod").append(title);
            $("#apod").append(hdurl);
            $("#apod").append(copyright);
            $("#apod").append(date);
            $("#apod").append(user_name);
        }) 
    </script>

@endsection
