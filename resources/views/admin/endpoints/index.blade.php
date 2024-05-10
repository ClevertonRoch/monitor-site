<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Endpoints do site {{ $site->url }}
        </h3>
        <div>
            {{-- <a class="bg-blue-600 px-4 py-1 rounded" href="{{ route('sites.create') }}">Novo</a> --}}
            <x-link-secondary href="{{ route('endpoints.create', $site->id) }}">+ Endpoint</x-link-secondary>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-alerts />

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Endpoints
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Frequencia
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Próxima verificação
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($endpoints as $endpoint)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $endpoint->endpoint }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $endpoint->frequency }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $endpoint->next_check }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('endpoints.edit', [$site, $endpoint]) }}">
                                            <x-primary-button>Editar</x-primary-button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="m-2">
                            {{-- {{ $sites->links() }} --}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
