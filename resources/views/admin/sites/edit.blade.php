<x-app-layout>
    <div class="container mx-auto flex flex-col items-center justify-center gap-5 mt-10">
        <h1 class="dark:text-white">Editar Site</h1>
        <x-alerts />

        <form action="{{ route('sites.update', $site->id) }}" method="post" class="w-1/2">
            @method('PUT')
            @csrf
            <x-input-label for="url" value="Url" />
            <x-input-primary id="url" name="url" type="text" value="{{ $site->url ?? old('url') }}" />
            <x-primary-button class="mt-2">Enviar</x-primary-button>
        </form>
    </div>
</x-app-layout>
