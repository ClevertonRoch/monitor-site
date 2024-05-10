<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sites Cadastrados') }}
        </h2>
        <a class="bg-blue-600 px-4 py-1 rounded" href="{{ route('sites.create') }}">Novo</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts />



                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Site
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sites as $site)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $site->url }}</th>
                                        <td class="px-6 py-4">

                                                <a href="{{ route('endpoints.index', [$site->id]) }}">
                                                    <x-primary-button>ver</x-primary-button>
                                                </a>
                                                <a href="{{ route('sites.edit', $site->id) }}">
                                                    <x-primary-button>Editar</x-primary-button>
                                                </a>
                                                <form action="{{ route('sites.destroy', $site->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-primary-button>Excluir</x-primary-button>
                                                </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="m-2">
                            {{ $sites->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
