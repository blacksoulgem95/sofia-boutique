<?php
$modalButtons = json_decode(json_encode([
    [
        "label" => "<i class='fa-solid fa-floppy-disk'></i>&nbsp;".__('actions.save'),
        "onclick" => "submitForm('".$id."_form')"
    ],
    [
        "label" => "<i class='fa-solid fa-ban'></i>&nbsp;".__('actions.close'),
        "onclick" => "closeModal('$id')"
    ]
]), false);
?>
<x-modal :id="$id" :buttons="$modalButtons" header="{{__('actions.create')}} - {{__('address.address')}}">
    <form id="{{$id}}_form" method="POST" action="{{route('profile')}}/add_address">
        @csrf
        <input type="hidden" name="modal_id" value="{{$id}}"/>

        @if (old('modal_id') === $id)
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @endif

        <div class="mt-4">
            <x-label for="name_line" :value="__('address.form.name_line')"/>

            <x-input id="name_line" class="block mt-1 w-full" type="text" name="name_line" :value="old('name_line')"/>
        </div>

        <div class="mt-4">
            <x-label for="co_line" :value="__('address.form.co_line')"/>

            <x-input id="co_line" class="block mt-1 w-full" type="text" name="co_line" :value="old('co_line')"/>
        </div>

        <div class="mt-4">
            <x-label for="line_1" :value="__('address.form.line_1')"/>

            <x-input id="line_1" class="block mt-1 w-full" type="text" name="line_1" :value="old('line_1')"/>
        </div>

        <div class="mt-4">
            <x-label for="line_2" :value="__('address.form.line_2')"/>

            <x-input id="line_2" class="block mt-1 w-full" type="text" name="line_2" :value="old('line_2')"/>
        </div>

        <div class="mt-4">
            <x-label for="zip" :value="__('address.form.zip')"/>

            <x-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="old('zip')"/>
        </div>

        <div class="mt-4">
            <x-label for="city" :value="__('address.form.city')"/>

            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"/>
        </div>

        <div class="mt-4">
            <x-label for="state" :value="__('address.form.state')"/>

            <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')"/>
        </div>

        <div class="mt-4">
            <x-label for="country" :value="__('address.form.country')"/>

            <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')"/>
        </div>

        <div class="mt-4">
            <x-label for="phone_number" :value="__('address.form.phone_number')"/>

            <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')"/>
        </div>

    </form>
</x-modal>
