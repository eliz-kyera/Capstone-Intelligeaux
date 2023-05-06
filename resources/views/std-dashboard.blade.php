<x-std-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex gap-4 flex-row">
                <button disabled id="reportbtn" href="" data-te-toggle="modal" data-te-target="#staticBackdrop" class="disabled:opacity-20 mt-4 mb-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">! Make Report</button>
                <input class="mt-6 form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-600 checked:border-green-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" name="" id="checkBox">
                <p class="mt-5 ml-[-1rem] text-sm"> click on checkbox to make report</p>
            </div>


            @forelse ($reports as $report)
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h2 class="font-bold text-2xl">{!! $report->title !!}</h2>
                <div class="flex gap-5">
                    <img class="h-24 w-24 object-cover rounded-full" src="{!! asset('images/'.$report->image)  !!}" alt="">
                    <div>
                        <p class="mt-2">
                            {!! Str::limit($report->description, 200) !!}
                        </p>
                        <span class="block mt-4 text-sm opacity-70">
                            {!! $report->created_at->diffForHumans() !!}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have Made No Reports On Fire Cases</p>
            @endforelse

            {!! $reports->links() !!}
        </div>


        <!-- Modal -->
        <div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none bg-white">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-600" id="exampleModalLabel">
                            Report a Fire Case Near You
                        </h5>
                        <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="getLoc" action="{{ route('std.report') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- content --}}
                        <input type="hidden" name="student_id" value="{!! Auth::id() !!}">
                        <input type="hidden" id="lat" name="latitude" value="">
                        <input type="hidden" id="lng" name="longitude" value="">
                        <div data-te-modal-body-ref class="relative p-4">
                            <!-- Report title -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" placeholder="Title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Image of incident -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Image')" />

                                <input class="block mt-1 w-full" type="file" name="image" value="{{ old('image') }}" accept="image/png, image/jpg, image/jpeg" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                            <!-- Report Description -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" name="description" id="description" rows="5" value="{!! old('description') !!}" required autofocus autocomplete="description" placeholder="Write a summary report on the incident, stating the location of place of incident"></textarea>
                                <span id="word_count" class="inline-flex float-right text-[.6rem] text-gray-400 ">225/225</span>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>

                        {{-- buttons --}}
                        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <button type="button" class="inline-block rounded bg-danger-300 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-danger-700 transition duration-150 ease-in-out hover:bg-danger-200 focus:bg-danger-100 focus:outline-none focus:ring-0 active:bg-danger-400" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                Cancel
                            </button>
                            <button type="submit" class="ml-1 inline-block rounded bg-success px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light">
                                Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <Script>
                const checkbox = document.getElementById('checkBox');
                let reportbtn = document.getElementById('reportbtn');
                checkbox.onchange = function() {
                    if (this.checked) {
                        reportbtn.disabled = false;
                    } else {
                        reportbtn.disabled = true;
                    }
                }
                //write function to get current location of user
                const form = document.getElementById('getLoc');
                form.addEventListener('submit', function(event) {
                    if (navigator.geolocation) {
                        event.preventDefault(); // Prevent form submission
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var lat = position.coords.latitude;
                            var lng = position.coords.longitude;
                            document.getElementById('lat').value = lat;
                            document.getElementById('lng').value = lng;
                            document.getElementById('getLoc').submit(); // Submit form after updating hidden input fields

                        });
                        localStorage.setItem('disableCheckboxUntil', Date.now() + 2 * 60 * 60);

                    } else {
                        alert('Geolocation is not supported by this browser.');
                    }
                });

                const disableCheckboxUntil = localStorage.getItem('disableCheckboxUntil');

                if (disableCheckboxUntil && Date.now() < disableCheckboxUntil) {
                    checkbox.disabled = true;
                }



                // Setting limit on number of words to be typed in mentee message

                let description = document.getElementById("description");
                let word_count = document.getElementById("word_count");
                description.addEventListener("input", function() {
                    word_count.textContent = description.value.length + "/225";
                    if (description.value.length > 224) {
                        description.value = description.value.substring(0, 224);
                        word_count.style.color = "red";
                    } else {
                        word_count.style.color = "green";
                    }

                });

            </Script>

        </div>


</x-std-layout>
