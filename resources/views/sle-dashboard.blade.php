<x-sle-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('SLE Dashboard') }}
            </h2>
            <div class="flex gap-2">
            @empty($appointmentNotification->count())
            <div></div>
            @else
            <div class="flex gap-1">
                <span class="text-xs font-extrabold inline-flex text-red-600">{{ $appointmentNotification->count() }}</span>
                <a class="text-xs" href="{{ route('sle.appointments') }}">New Approved Appointment</a>
            </div>
            @endempty
            <div class=" sm:flex sm:items-center sm:ml-6">
                <x-notification-dropdown align="right" width="48rem">
                    <div class="inline-flex items-center px-3 py-2">
                        <x-slot name="trigger">
                            @if($unapprovedReport->count() == 0)
                            <span>
                            </span>
                            @else
                            <span class="relative flex h-full w-full top-[0.7rem] left-[0.2rem]">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-full w-full p-[0.15rem] bg-[#b00000] text-[10px] text-center text-white">{{ $unapprovedReport->count() }}</span>
                            </span>
                            @endif
                            <span class="w-full cursor-pointer">🔔</span>
                        </x-slot>
                        <x-slot name="content">
                            @forelse ($unapprovedReport as $report)
                            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                                <h2 class="font-bold text-2xl">{!! $report->title !!}</h2>
                                <div class="flex justify-between">
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

                                    <a href="{{ route('sle.view.report', $report->id) }}" class=" mt-4 mb-4 inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        View to Approve
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

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="m-3 font-bold uppercase">Approved Fire Case Reports</h2>


            @forelse ($reports as $report)
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h2 class="font-bold text-2xl">{!! $report->title !!}</h2>
                <div class="flex justify-between">
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
                    
                    <button readonly onclick="alert('This Report Has Been Approved Already')" class="mt-4 mb-4 inline-flex items-center px-4 py-2 bg-slate-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-500 active:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Approved
                    </button>
                </div>
            </div>
            @empty
            <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have No New Reports On Fire Cases To Approve</p>
            @endforelse

            {!! $reports->links() !!}
        </div>



</x-sle-layout>
