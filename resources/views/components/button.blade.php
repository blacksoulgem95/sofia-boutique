<button {{ $attributes->merge(['type' => 'submit', 'class' => 'sf-btn']) }}>
    {{ $slot }}
</button>
