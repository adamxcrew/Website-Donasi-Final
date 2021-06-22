<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-indigo mr-2']) }}>
    {{ $slot }}
</button>
