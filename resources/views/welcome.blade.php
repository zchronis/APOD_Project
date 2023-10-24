@extends('includes.header')


@section('body')

<div class="container d-flex bootstrap-grid text-light text-center mt-3">
    <div class="col">
        <h2>Todays Astronomy Picture of the Day</h2>
        <h3>Date: 2023-10-24<h3>
        <img src="https://apod.nasa.gov/apod/image/2310/Arp87_HubblePathak_2512.jpg" class="img-fluid" alt="Nasa Astronomy Picture of the Day">
        <h6>This dance is to the death.  As these two large galaxies duel, a cosmic bridge of stars, gas, and dust currently stretches over 75,000 light-years and joins them.  The bridge itself is strong evidence that these two immense star systems have passed close to each other and experienced violent tides induced by mutual gravity. As further evidence, the face-on spiral galaxy on the right, also known as NGC 3808A, exhibits many young blue star clusters produced in a burst of star formation. The twisted edge-on spiral on the left (NGC 3808B) seems to be wrapped in the material bridging the galaxies and surrounded by a curious polar ring. Together, the system is known as Arp 87. While such interactions are drawn out over billions of years, repeated close passages will ultimately create one merged galaxy. Although this scenario does look unusual, galactic mergers are thought to be common, with Arp 87 representing a stage in this inevitable process. The Arp 87 dancing pair are about 300 million light-years distant toward the constellation of the Lion (Leo). The prominent edge-on spiral galaxy at the far left appears to be a more distant background galaxy and not involved in the on-going merger.<h6>
    </div>
</div>

@endsection
