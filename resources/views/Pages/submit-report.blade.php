<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Your Report') }}
        </h2>
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <br>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <form action="{{ route('fire.post.submit.report') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row gap-2">
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
                        <div>
                            <button type="submit" class=" mt-8 inline-block items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">Submit Report</button>
                        </div>
                    </div>
                </form>
            </div>

            @forelse ($submittedReport as $report)
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h2 class="font-bold mr-5 inline-block text-2xl">{!! $report->title !!}</h2>
                <a href="{!! asset('reports/'.$report->file_name)  !!}" class="inline-block mr-5 hover:text-blue-500">Click to Download File - {{ $report->file_name }}</a>
                <span class="inline-block mt-4 text-sm opacity-70">
                    {!! $report->created_at->diffForHumans() !!}
                </span>
            </div>
            @empty
            <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have Made No Submissions Yet</p>
            @endforelse

            {!! $submittedReport->links() !!}

            {{-- <p class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">You Have Made No Submissions Yet</p> --}}
        </div>
    </div>



</x-app-layout>
