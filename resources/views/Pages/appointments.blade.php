<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Appointments') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="m-3 font-bold uppercase">View New Booked Appointments</h2>


            @forelse ($unapprovedAppointments as $appointment)
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex justify-between">
                    <div>
                        <h2 class="font-bold text-2xl">{!! $appointment->purpose !!}</h2>
                        <h2 class="font-bold text-xl">{!! Str::limit($appointment->description, 200) !!}</h2>
                        <h2 class="font-bold text-xl">{!! $appointment->date !!}</h2>
                        <p>{!! $appointment->updated_at->diffForHumans() !!}</p>
                    </div>

                    <a href="" data-te-toggle="modal" data-te-target="#staticBackdrop" class="mt-4 mb-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        View Appointment
                    </a>
                </div>
            </div>

            <!-- Modal -->
            <div data-te-modal-init class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                    <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none bg-white">
                        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-600" id="exampleModalLabel">
                                Details of Appointment
                            </h5>
                            <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-3">
                            <h2 class="font-bold text-2xl">{!! $appointment->purpose !!}</h2>
                            <h4 class="font-bold">Description:</h4>
                            <h2 class="text-xl">{!! $appointment->description !!}</h2>
                            <h4 class="font-bold">Date:</h4>
                            <h2 class="text-xl">{!! $appointment->date !!}</h2>
                            <p class="text-sm">{!! $appointment->updated_at->diffForHumans() !!}</p>


                            <form action="{{ route('fire.update.appointment') }}" method="post">
                                @csrf

                                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                <!-- date Address -->
                                <div class="mt-4">
                                    <x-input-label for="date" :value="__('Date')" />
                                    <h4 class="text-[0.65rem] font-extrabold text-red-800">Approve appointment by scheduling a covenient date</h4>
                                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" autocomplete="username" />
                                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                                </div>
                                <!-- description -->
                                <div class="mt-4">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea id="description" class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" name="description" id="description" rows="5" value="{!! old('description') !!}" required autofocus autocomplete="description" placeholder="Write comments to approve or reject appointment by stating a reason"></textarea>
                                    <span id="word_count" class="inline-flex float-right text-[.6rem] text-gray-400 ">225/225</span>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                {{-- buttons --}}
                                <div class="flex gap-3 items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <button class="mt-4 mb-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" data-te-modal-dismiss>
                                        cancel
                                    </button>
                                    <button type="submit" class="mt-4 mb-4 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have No New Booked Appointments</p>
            @endforelse

            {!! $unapprovedAppointments->links() !!}
        </div>

        <script>
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

        </script>




    </div>

</x-app-layout>
