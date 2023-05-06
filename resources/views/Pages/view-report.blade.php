<x-app-layout>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Closing Fire Report') }}
        </h2>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex justify-between">
                    <div>
                        <p class="font-bold text-lg uppercase">Title: </p>
                        <p> {!! $approvedReport->title !!}</p>
                    </div>
                    <div>
                        <button data-te-toggle="modal" data-te-target="#staticBackdrop" class=" mt-4 mb-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Close Report</button>
                    </div>
                </div>
                <p class="mt-4 font-bold text-lg uppercase">Description: </p>
                <p>{!! $approvedReport->description !!}</p>
                <div class="flex justify-between">
                    <div>
                        <p class="mt-4 font-bold text-lg uppercase">Name of SLE: </p>
                        <p>{!! $approvedReport->sle->firstname !!} {!! $approvedReport->sle->surname !!}</p>
                    </div>
                    <div>
                        <p class="mt-4 font-bold text-lg uppercase">Contact: </p>
                        <p>{!! $approvedReport->sle->contact !!} - {!! $approvedReport->sle->job_position !!}</p>
                    </div>
                </div>

                <!-- Modal -->
                <div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none bg-white">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-600" id="exampleModalLabel">
                                    Close This Report
                                </h5>
                                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <form action="{{ route('fire.post.submit.report') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="report_id" value="{{ $approvedReport->id }}">
                                <div class="flex flex-col p-5 gap-2">
                                    <h4 class="text-[.65rem] mt-[-1rem] text-neutral-700">Close a report by submitting a <strong>word doc </strong> or a <strong>pdf</strong> to give a summary on what happened during the fire incident and how it was rectified in details. <strong>THIS DOCUMENT MUST BE SUBMITTED AFTER FIRE INICIDENT HAS BEEN RECTIFIED.</strong></h4>
                                    <div>
                                        <label for="formFile" class="mb-2 inline-block text-sm text-neutral-700 dark:text-neutral-600">Title</label>
                                        <br>
                                        <input type="text" name="title" id="" class="rounded w-80 border h-[2.3rem] border-gray-300" placeholder="Description of Report" value="{{old('title')}}" autocomplete="true" required>
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />

                                    </div>
                                    <div>
                                        <label for="formFile" class="mb-2 inline-block text-sm text-neutral-700 dark:text-neutral-600">Submit Report As .docx or .pdf</label>
                                        <input class="relative m-0 block p-2 w-[20rem] min-w-0 flex-auto rounded border border-neutral-300 bo bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-danger focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-600 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-danger" name="file_name" value="{{old('file_name')}}" type="file" id="formFile" required accept=".pdf,.doc,.docx">
                                        <x-input-error :messages="$errors->get('file_name')" class="mt-2" />
                                    </div>

                                </div>


                                {{-- buttons --}}
                                <div class="flex gap-3 items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <button class="mt-4 mb-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" data-te-modal-dismiss>
                                        close
                                    </button>

                                    <button type="submit" class=" mt-4 mb-4 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">Submit Report</button>

                                </div>
                        </div>
                        </form>
                    </div>

                </div>


                <div class="flex mt-4 flex-sm-wrap gap-5">
                    <div class="w-1/2"><img class="mt-4 w-full h-[20rem]" src="{!! asset('images/'.$approvedReport->image) !!}" alt=""></div>
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
                    lat: {
                        {
                            $approvedReport - > latitude
                        }
                    }
                    , lng: {
                        {
                            $approvedReport - > longitude
                        }
                    }
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
                    content: '{{ $approvedReport->title }}'
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
</x-app-layout>
