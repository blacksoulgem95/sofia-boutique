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
    <form id="{{$id}}_form" method="POST" action="{{route('profile')}}/legal">
        @csrf
        <input type="hidden" name="modal_id" value="{{$id}}"/>

        @if (old('modal_id') === $id)
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @endif

        <div class="mt-4">
            <x-label for="legal_name" :value="__('user.form.legal_name')"/>

            <x-input id="legal_name" class="block mt-1 w-full" type="text" name="legal_name"
                     :value="old('legal_name', $user->legal_name)" placeholder="Caius Iulius"
            />
        </div>
        <div class="mt-4">
            <x-label for="surname" :value="__('user.form.surname')"/>

            <x-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                     :value="old('surname', $user->surname)" placeholder="Cæsar"/>
        </div>

        <div class="mt-4">
            <x-label for="company_name" :value="__('user.form.company_name')"/>

            <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                     :value="old('company_name', $user->company_name)" placeholder="My Business Srl"/>
        </div>

        <div class="mt-4">
            <x-label for="vat_number" :value="__('user.form.vat_number')"/>

            <x-input id="vat_number" class="block mt-1 w-full" type="text" name="vat_number"
                     :value="old('vat_number', $user->vat_number)" placeholder="IT12345678901"/>
        </div>

        <div class="mt-4">
            <x-label for="fiscal_code" :value="__('user.form.fiscal_code')"/>

            <x-input id="fiscal_code" class="block mt-1 w-full" type="text" name="fiscal_code"
                     :value="old('fiscal_code', $user->fiscal_code)" placeholder="GSPVRD80A01H501E"/>
        </div>

        <div class="mt-4">
            <x-label for="sdi_number" :value="__('user.form.sdi_number')"/>

            <x-input id="sdi_number" class="block mt-1 w-full" type="text" name="sdi_number"
                     :value="old('sdi_number', $user->sdi_number)" placeholder="0XXY000"/>
        </div>

        <div class="mt-4">
            <x-label for="certified_email" :value="__('user.form.certified_email')"/>

            <x-input id="certified_email" class="block mt-1 w-full" type="text" name="certified_email"
                     :value="old('certified_email', $user->certified_email)" placeholder="mybusiness@legalmail.it"/>
        </div>

    </form>
</x-modal>
