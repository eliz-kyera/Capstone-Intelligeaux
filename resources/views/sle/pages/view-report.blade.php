<x-sle-layout>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve Fire Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex justify-between">
                    <div>
                        <p class="font-bold text-lg uppercase">Title: </p>
                        <p> {!! $report->title !!}</p>
                    </div>
                    <div class="flex gap-3">
                    <form action="{{ route('sle.reject.report', $report->id) }}" method="get">
                        @csrf
                        <button type="submit" class=" mt-4 mb-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Reject</button>
                    </form>
                    <form action="{{ route('sle.approve.report', $report->id) }}" method="get">
                        @csrf
                        <button type="submit" class=" mt-4 mb-4 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">Approve</button>
                    </form>
                    </div>
                </div>
                <p class="mt-4 font-bold text-lg uppercase">Description: </p>
                <p>{!! $report->description !!}</p>
                <div class="flex justify-between">
                 <div>
                    <p class="mt-4 font-bold text-lg uppercase">Name of Student: </p>
                    <p>{!! $report->student->firstname !!} {!! $report->student->surname !!}</p>
                 </div>
                    <div>
                    <p class="mt-4 font-bold text-lg uppercase">Contact: </p>
                    <p>{!! $report->student->contact !!} - {!! $report->student->hostel !!}</p>
                    </div>
                </div>

                <div class="flex mt-4 flex-sm-wrap gap-5">
                    <div class="w-1/2"><img class="mt-4 w-full h-[20rem]" src="{!! asset('images/'.$report->image) !!}" alt=""></div>
                    <style>
                        #map {
                            height: 400px !important;
                            width: 100% !important;
                        }

                    </style>
                    <div class="w-1/2 h-full" id="map"></div>
                </div>
            </div>
        </div>

        <script async src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&callback=initMap&v=weekly" defer>
        </script>
        <script>
            function initMap() {
                const myLatLng = {
                    lat: {{$report->latitude}}
                    , lng: {{$report->longitude}}
                }
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14
                    , center: myLatLng
                , });

                var marker = new google.maps.Marker({
                    position: myLatLng
                    , map
                    , title: "Location of Fire Occurance"
                , });

                var infoWindow = new google.maps.InfoWindow({
                    content: '{{ $report->title }}'
                });

                marker.addListener("click", function() {
                    infoWindow.open(map, marker);
                });

            }

            window.initMap = initMap;
            //call the function initMap
            //initMap();

        </script>
    </div>
</x-sle-layout>
