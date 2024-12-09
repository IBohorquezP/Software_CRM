<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-naranja-industrial-500 p-2 border-[3px] border-amarillo-oscuro-950 font-semibold transition-all duration-300 hover:bg-naranja-industrial-600 hover:text-white']) }}>
    {{ $slot }}
</button>
