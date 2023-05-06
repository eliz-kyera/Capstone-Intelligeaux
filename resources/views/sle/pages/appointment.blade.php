<x-sle-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approved Appointments') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="m-3 font-bold uppercase">View Approved Appointments</h2>


            @forelse ($approvedAppointments as $appointment)
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex justify-between">
                    <div>
                        <h2 class="font-bold text-2xl">{!! $appointment->purpose !!}</h2>
                        <h2 class="font-bold text-2xl">{!! Str::limit($appointment->description, 200) !!}</h2>
                        <h2 class="font-bold text-2xl">{!! $appointment->date !!}</h2>
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
                                Details of Approved Appointment
                            </h5>
                            <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-3">
                            <h2 class="font-bold text-2xl">{!! $appointment->purpose !!}</h2>
                            <h2 class="text-xl">{!! Str::limit($appointment->description, 200) !!}</h2>
                            <h2 class="text-xl">{!! $appointment->date !!}</h2>
                            <p class="text-sm">{!! $appointment->updated_at->diffForHumans() !!}</p>
                        </div>


                        {{-- buttons --}}
                        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <button class="mt-4 mb-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" data-te-modal-dismiss>
                                close
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have No New Approved Appointments</p>
            @endforelse

            {!! $approvedAppointments->links() !!}
        </div>





    </div>

</x-sle-layout>
