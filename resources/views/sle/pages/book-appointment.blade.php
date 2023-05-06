<x-sle-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book An Appointment With Fire Department') }}
        </h2>
    </x-slot>
    <br>
    <div class=" w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md justify-center overflow-hidden sm:rounded-lg" style="margin: 0 auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
            <form method="POST" action="{{ route('sle.book.appointment') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="sle_id" value="{!! Auth::id() !!}">
                <!-- Purpose -->
                <div>
                    <x-input-label for="purpose" :value="__('Purpose')" />
                    <x-text-input id="purpose" class="block mt-1 w-full" type="text" name="purpose" :value="old('purpose')" required autofocus autocomplete="purpose" />
                    <x-input-error :messages="$errors->get('purpose')" class="mt-2" />
                </div>
                <!-- venue -->
                <div class="mt-4">
                    <x-input-label for="venue" :value="__('Venue')" />
                    <x-text-input id="venue" class="block mt-1 w-full" type="text" name="venue" :value="old('venue')" required autofocus autocomplete="venue" />
                    <x-input-error :messages="$errors->get('venue')" class="mt-2" />
                </div>

                <!-- date Address -->
                <div class="mt-4">
                    <x-input-label for="date" :value="__('Date')" />
                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>
                <!-- description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" class="border-gray-300 mt-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" name="description" id="description" rows="5" value="{!! old('description') !!}" required autofocus autocomplete="description" placeholder="Write a summary on why you want to book for an appointment"></textarea>
                    <span id="word_count" class="inline-flex float-right text-[.6rem] text-gray-400 ">225/225</span>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>


                <div class="flex items-center justify-center mt-4">
                    <x-fire-button class="ml-4">
                        {{ __('Book Appointment') }}
                    </x-fire-button>
                </div>
            </form>
        </div>
    </div>
    <br>

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

</x-sle-layout>
