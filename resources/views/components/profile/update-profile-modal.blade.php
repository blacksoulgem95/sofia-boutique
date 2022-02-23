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
<x-modal :id="$id" :buttons="$modalButtons" header="{{__('actions.edit')}} - {{__('user.profile')}}">
    <form id="{{$id}}_form" method="POST" action="{{route('profile')}}">
        @csrf
        <div class="mt-4">
            <x-label for="name" :value="__('user.form.name')"/>

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"/>
        </div>

        <div class="mt-4">
            <x-label for="email" :value="__('user.form.email')"/>

            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                     :value="$user->email"/>
        </div>
    </form>
</x-modal>
