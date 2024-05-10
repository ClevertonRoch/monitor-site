<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Cadastrar novo endpoint {{ $site->url }}
        </h3>
        <div>
            {{-- <a class="bg-blue-600 px-4 py-1 rounded" href="{{ route('sites.create') }}">Novo</a> --}}
            <x-link-secondary href="{{ route('endpoints.index', $site->id) }}">Listar</x-link-secondary>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-alerts />

                    <form action="{{ route('endpoints.store', $site->id) }}" method="post">
                        @csrf
                        <x-input-label for="endpoint" :value="__('Informe o Endpoint')" />
                        <x-input-primary placeholder="Endpoint"  name="endpoint" type="text" value="{{ old('endpoint') }}"/>
                        <br>
                        <x-input-label for="endpoint" :value="__('Informe a Frequency')" />
                        <x-input-primary placeholder="Frequencia" name="frequency" type="text" value="{{ old('frequency')}}"/>

                        <x-secondary-button class="mt-2">Enviar</x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
