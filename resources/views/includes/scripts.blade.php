<script>
    function get_apod(callback) {
        axios.get("https://api.nasa.gov/planetary/apod?api_key={{config('services.nasa.api_key')}}")
        .then(function(response) {
            let data = response.data;

            let hdurl           = data.hdurl        ? data.hdurl        : "N/A";
            let url             = data.url          ? data.url          : "N/A";
            let explanation     = data.explanation  ? data.explanation  : "N/A";
            let date            = data.date         ? data.date         : "N/A";
            let media_type      = data.media_type   ? data.media_type   : "N/A";
            let copyright       = data.copyright    ? data.copyright    : "all copyrights belong to their respective owners";
            let title           = data.title        ? data.title        : "N/A";

            callback({
                hdurl: hdurl,
                url: url,
                explanation: explanation,
                date: date,
                media_type: media_type,
                copyright: copyright,
                title: title
            });
        })
    }
</script>
