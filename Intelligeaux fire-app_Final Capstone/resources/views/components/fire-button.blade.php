<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#9b0000] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-[#9b0000] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
