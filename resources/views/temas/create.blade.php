<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('temas.store') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="nombre" :value="'Nombre del tema'" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                    required autofocus autocomplete="nombre" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
            <!-- anyo -->
            <div>
                <x-input-label for="anyo" :value="'Año del tema'" />
                <x-text-input id="anyo" class="block mt-1 w-full" type="text" name="anyo" :value="old('anyo')"
                    required autofocus autocomplete="anyo" />
                <x-input-error :messages="$errors->get('anyo')" class="mt-2" />
            </div>
            <!-- Duracion -->
            <div>
                <x-input-label for="duracion" :value="'Duracion'" />
                <x-text-input id="duracion" class="block mt-1 w-full" type="text" name="duracion" :value="old('duracion')"
                    required autofocus autocomplete="duracion" />
                <x-input-error :messages="$errors->get('duracion')" class="mt-2" />
            </div>
            <!-- Artista -->
            <div>
                <x-input-label for="artista_id" :value="'Artista'" />
                <select id="artista_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="artista_id" required>
                    @forelse ($artistas as $artista)
                        <option value="{{ $artista->id }}" {{ old('artista_id') == $artista->id ? 'selected' : '' }}>
                            {{ $artista->nombre }}
                        </option>

                    @empty
                        No existen artistas
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('artista_id')" class="mt-2" />
            </div>
            <!-- Album -->
            <div>
                <x-input-label for="album_id" :value="'Album'" />
                <select id="album_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="album_id" required>
                    @forelse ($albumes as $album)
                        <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>
                            {{ $album->titulo }}
                        </option>

                    @empty
                        No existen albums
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('album_id')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('temas.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
