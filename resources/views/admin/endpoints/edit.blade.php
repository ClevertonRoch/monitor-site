<x-app-layout>
    <div class="container mx-auto flex flex-col items-center justify-center gap-5 mt-10">
        <h1 class="dark:text-white">Editar Endpoint do site {{ $site->url }}</h1>
        <x-alerts />

        <form action="{{ route('endpoints.update', [$site->id ,$endpoint->id]) }}" method="post" class="w-1/2">
            @method('PUT')
            @csrf
            <x-input-label for="endpoint" value="Endpoint" />
            <x-input-primary id="endpoint" name="endpoint" type="text" value="{{ $endpoint->endpoint }}" />

            <x-input-label for="frequency" value="Frequencia" />
            <x-input-primary id="frequency" name="frequency" type="text" value="{{ $endpoint->frequency }}" />


            <x-primary-button class="mt-2">Salvar Alteração</x-primary-button>
        </form>
        <form action="{{ route('endpoints.destroy', [$site, $endpoint]) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-primary-button>Excluir este Endpoint</x-primary-button>
        </form>
    </div>
</x-app-layout>
