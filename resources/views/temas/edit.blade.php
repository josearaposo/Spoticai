<x-app-layout>
    <div class="w-1/2 mx-auto">
        <livewire:selector />
        <form method="POST" action="{{ route('temas.update', ['tema' => $tema]) }}">
            @csrf
            @method('PUT')

            <!-- Título -->
            <div>
                <x-input-label for="nombre" :value="'Título del tema'" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $tema->nombre)"
                    required autofocus autocomplete="nombre" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
            <!-- Año -->
            <div>
                <x-input-label for="anyo" :value="'Año del tema'" />
                <x-text-input id="anyo" class="block mt-1 w-full" type="text" name="anyo" :value="old('anyo', $tema->anyo)"
                    required autofocus autocomplete="anyo" />
                <x-input-error :messages="$errors->get('anyo')" class="mt-2" />
            </div>

            <!-- duracion -->
            <div>
                <x-input-label for="duracion" :value="'Duracion en segundos'" />
                <x-text-input id="duracion" class="block mt-1 w-full" type="text" name="duracion" :value="old('duracion', $tema->duracion)"
                    required autofocus autocomplete="duracion" />
                <x-input-error :messages="$errors->get('duracion')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('temas.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
