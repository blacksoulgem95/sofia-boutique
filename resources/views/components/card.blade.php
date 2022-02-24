<div {{$attributes->merge(['class' => 'pt-12'])}}>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white sf-card overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sf-card bg-white border-b border-gray-200">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
