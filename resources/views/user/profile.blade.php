<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            {{ __('user.profile') }}--}}
            {{$user->name}} {{$user->surname}}
        </h2>
    </x-slot>

    <x-card>
        <h2 class="text-xl">{{__('user.profile')}}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="mt-4">
                <x-label for="name" :value="__('user.form.name')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name"
                         readonly disabled/>
            </div>
            <div class="mt-4">
                <x-label for="surname" :value="__('user.form.surname')"/>

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                         :value="$user->surname" readonly disabled/>
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('user.form.email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                         :value="$user->email" readonly disabled/>
            </div>

            <div class="mt-4">
                <x-label for="created_at" :value="__('user.form.created_at')"/>

                <x-input id="created_at" class="block mt-1 w-full" type="datetime-local" name="created_at"
                         value="{{$user->created_at->format('Y-m-d\TH:i')}}" readonly
                         disabled/>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <x-button onclick="openModal('update_profile_modal')"><i class='fa-solid fa-pencil-alt'></i>&nbsp;{{__('actions.edit')}}</x-button>
        </div>

    </x-card>

    <x-card>
        <h2 class="text-xl flex justify-between">
            <span>{{__('user.addresses')}}</span>
            <x-button><i class="fa-solid fa-plus"></i></x-button>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-1 mt-4">
            @foreach($user->addresses as $address)
                <div>
                    <strong>{{__('address.contact')}}</strong><br/>
                    {{$address->name_line}} <br/>
                    @if (isset($address->co_line))
                        {{$address->co_line}} <br/>
                    @endif
                    {{$address->phone_number}}
                </div>
                <div>
                    <strong>{{__('address.address')}}</strong><br/>
                    {{$address->line_1}} <br/>
                    @if (isset($address->line_2))
                        {{$address->line_2}} <br/>
                    @endif
                    {{$address->zip}} {{$address->city}}<br/>
                    {{$address->state}}, {{$address->country}}
                </div>
                <div>
                    <strong>{{__('actions.actions')}}</strong>
                    <div class="flex flex-col gap-2">
                        <x-button><i class="fa-solid fa-trash"></i>&nbsp;{{__('actions.delete')}}</x-button>
                        <x-button><i class="fa-solid fa-file-invoice"></i>&nbsp;{{__('actions.address.set_billing')}}
                        </x-button>
                    </div>
                </div>
                @if(!$loop->last)
                    <div class="md:col-span-3 border-b border-pink-300 border-b-2 mt-4 mb-4"></div>
                @endif
            @endforeach
        </div>
    </x-card>

    <x-card class="pb-12">
        <h2 class="text-xl">
            <span>{{__('user.billing')}}</span>

        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="mt-4">
                <x-label for="legal_name" :value="__('user.form.legal_name')"/>

                <x-input id="legal_name" class="block mt-1 w-full" type="text" name="legal_name"
                         :value="$user->legal_name"
                         readonly disabled/>
            </div>
            <div class="mt-4">
                <x-label for="surname" :value="__('user.form.surname')"/>

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                         :value="$user->surname" readonly disabled/>
            </div>

            <div class="mt-4 md:col-span-2">
                <x-label for="company_name" :value="__('user.form.company_name')"/>

                <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                         :value="$user->company_name" readonly disabled/>
            </div>

            <div class="mt-4">
                <x-label for="vat_number" :value="__('user.form.vat_number')"/>

                <x-input id="vat_number" class="block mt-1 w-full" type="text" name="vat_number"
                         :value="$user->vat_number" readonly disabled/>
            </div>

            <div class="mt-4">
                <x-label for="fiscal_code" :value="__('user.form.fiscal_code')"/>

                <x-input id="fiscal_code" class="block mt-1 w-full" type="text" name="fiscal_code"
                         :value="$user->fiscal_code" readonly disabled/>
            </div>

            <div class="mt-4">
                <x-label for="sdi_number" :value="__('user.form.sdi_number')"/>

                <x-input id="sdi_number" class="block mt-1 w-full" type="text" name="sdi_number"
                         :value="$user->sdi_number" readonly disabled/>
            </div>

            <div class="mt-4">
                <x-label for="certified_email" :value="__('user.form.certified_email')"/>

                <x-input id="certified_email" class="block mt-1 w-full" type="text" name="sdi_number"
                         :value="$user->certified_email" readonly disabled/>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <x-button onclick="openModal('update_legal_modal')"><i class='fa-solid fa-pencil-alt'></i>&nbsp;{{__('actions.edit')}}</x-button>
        </div>

        <div class="flex flex-col mt-4">
            <h3 class="text-xl">{{__('user.billing_address')}}</h3>
            <div class="flex mt-4 gap-4">
                @if (isset($user->billingAddress))
                    <p>
                        {{$user->billingAddress->line_1}}<br/>
                        @if (isset($user->billingAddress->line_2))
                            {{$user->billingAddress->line_2}}<br/>
                        @endif
                    </p>
                    <p>
                        {{$user->billingAddress->zip}} - {{$user->billingAddress->city}},
                        {{$user->billingAddress->state}}, {{$user->billingAddress->country}}<br/>
                    </p>
                @endif
            </div>
        </div>
    </x-card>
    <x-profile.update-profile-modal :user="$user" id="update_profile_modal"></x-profile.update-profile-modal>
    <x-profile.update-legal-modal :user="$user" id="update_legal_modal"></x-profile.update-legal-modal>
</x-app-layout>
