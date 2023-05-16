<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Fire Department') }}
            </h2>
            <div class="flex">
                {{-- @empty($appointmentNotification->count())
                <div></div>
                @else
                <div class="flex items-baseline gap-1">
                    <span class="text-xs font-extrabold inline-flex text-red-600">{{ $appointmentNotification->count() }}</span>
                <a class="text-xs" href="{{ route('fire.appointment') }}">New Appointment</a>
            </div>

            @endempty --}}
            <div class=" sm:flex sm:items-center sm:ml-6">
                <x-notification-dropdown align="right" width="48rem">
                    <div class="inline-flex items-center px-3 py-2">
                        <x-slot name="trigger">
                            @if($appointmentNotification->count() == 0)
                            <span>
                            </span>
                            @else
                            <span class="relative flex h-full w-full top-[0.7rem] left-[0.2rem]">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-full w-full p-[0.15rem] bg-[#b00000] text-[10px] text-center text-white">{{ $appointmentNotification->count() }}</span>
                            </span>
                            @endif
                            <span class="w-full cursor-pointer">🔔</span>
                        </x-slot>
                        <x-slot name="content">
                            @forelse ($appointmentNotification as $report)
                            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                                <h2 class="font-bold text-2xl">{!! $report->title !!}</h2>
                                <div class="flex justify-between">
                                    <div class="">
                                        <p class="font-bold">{{ $report->purpose }}</p>

                                        <p class="mt-2">
                                            {!! Str::limit($report->description, 200) !!}
                                        </p>
                                        <span class="block mt-4 text-sm opacity-70">
                                            {!! $report->created_at->diffForHumans() !!}
                                        </span>

                                    </div>

                                    <a href="{{ route('fire.appointment') }}" class=" mt-4 mb-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        View
                                    </a>
                                </div>
                            </div>
                            @empty
                            <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have No New Reports On Fire Cases To Approve</p>
                            @endforelse
                        </x-slot>
                    </div>
                </x-notification-dropdown>
            </div>
        </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="m-3 font-bold uppercase">View Available Reports</h2>
            @forelse ($approvedReports as $report)
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex justify-between">
                    <div>
                        <h2 class="font-bold text-2xl">{!! $report->title !!}</h2>
                    </div>
                    <div>
                        <form action="{{ route('fire.view.report', $report->id) }}" method="get">
                            @csrf
                            <button type="submit" class=" mt-4 mb-4 inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">View Report</button>
                        </form>
                    </div>

                </div>
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
            <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have No New Reports On Fire Cases</p>
            @endforelse

            {!! $approvedReports->links() !!}
        </div>
    </div>

</x-app-layout>
