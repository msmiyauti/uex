
@use('Illuminate\Support\Facades\Vite')
<x-app-layout>
    
    @vite(['resources/js/consulta.js'])
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Informação do Contato') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>
                    
                        <form method="post" action="{{ route('contatos.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <input id="id" name="id" type="hidden" value="<?php echo $contatos->id?>">
                            <div>
                                <x-input-label for="nome" :value="__('Nome')" />
                                <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', $contatos->nome)" required autofocus autocomplete="nome" />
                                <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                            </div>
                            <div x-data={}>
                                <x-input-label for="cpf" :value="__('CPF')" />
                                <x-text-input id="cpf" name="cpf" x-mask="999.999.999-99" type="text" placeholder="999.999.999-99" class="mt-1 block w-full maska" :value="old('cpf', $contatos->cpf)" required autofocus autocomplete="cpf" />
                                <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
                                
                            </div>
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $contatos->email)" required autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    
                                @if ($contatos instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $contatos->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Your email address is unverified.') }}
                    
                                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>
                    
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                    
                            <div x-data={}>
                                <x-input-label for="telefone" :value="__('Telefone')" />
                                <x-text-input id="telefone" name="telefone" x-mask="(99) 99999-9999"  type="text" placeholder="(99) 99999-9999" class="mt-1 block w-full" :value="old('telefone', $contatos->telefone)" required autofocus autocomplete="telefone" />
                                <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                            </div>
                            <div class="edit-contato">
                                <div class="place-autocomplete-card" id="place-autocomplete-card">
                                    <p>Procure seu endereço:</p>
                                  </div>
                                  <div id="map"></div>
                                 <!-- prettier-ignore -->
                                <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                                ({key: "AIzaSyBoxJ1kpvtgK_W1oGR4dZk4Umrg5DM-ioA", v: "beta"});</script>

                            </div>
                            <div x-data={}>
                                <x-input-label for="cep" :value="__('CEP')" />
                                <x-text-input id="cep" name="cep" x-mask="99999-999"  placeholder="99999-999" type="text" class="mt-1 block w-full" :value="old('cep', $contatos->cep)" required autofocus autocomplete="cep" />
                                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
                            </div>

                            <div class="logradouro">
                                <x-input-label for="logradouro" :value="__('Logradouro')" />
                                <x-text-input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" :value="old('logradouro', $contatos->logradouro)" required autofocus autocomplete="logradouro" />
                                <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
                            </div>
                            <div>
                                <x-input-label for="numero" :value="__('Número')" />
                                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" :value="old('numero', $contatos->numero)" required autofocus autocomplete="numero" />
                                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
                            </div>
                            <div>
                                <x-input-label for="complemento" :value="__('Complemento')" />
                                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" :value="old('complemento', $contatos->complemento)"  autofocus autocomplete="complemento" />
                                <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
                            </div>
                            <div>
                                <x-input-label for="bairro" :value="__('Bairro')" />
                                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" :value="old('bairro', $contatos->bairro)" required autofocus autocomplete="bairro" />
                                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
                            </div>
                            <div>
                                <x-input-label for="cidade" :value="__('Cidade')" />
                                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" :value="old('cidade', $contatos->cidade)" required autofocus autocomplete="cidade" />
                                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
                            </div>
                            <div>
                                <x-input-label for="uf" :value="__('UF')" />
                                <x-text-input id="uf" name="uf" type="text" class="mt-1 block w-full" :value="old('uf', $contatos->uf)" required autofocus autocomplete="uf" />
                                <x-input-error class="mt-2" :messages="$errors->get('uf')" />
                            </div>
                            <div>
                                <x-input-label for="latitude" :value="__('Latitude')" />
                                <x-text-input id="latitude" name="latitude" type="text" class="mt-1 block w-full" :value="old('latitude', $contatos->latitude)" required autofocus autocomplete="latitude" />
                                <x-input-error class="mt-2" :messages="$errors->get('latitude')" />
                            </div>
                            <div>
                                <x-input-label for="longitude" :value="__('Longitude')" />
                                <x-text-input id="longitude" name="longitude" type="text" class="mt-1 block w-full" :value="old('longitude', $contatos->longitude)" required autofocus autocomplete="longitude" />
                                <x-input-error class="mt-2" :messages="$errors->get('longitude')" />
                            </div>


                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                    
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
