<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Titulo: {{Str::upper($album->titulo)}}
                </h1>

                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-md lg:text-md dark:text-gray-400">
                    Año de salida: {{$album->anyo}}
                </p>

            </div>
        </div>
        <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Titulo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Año
                        </th>
                        <th scope="col" class="px-6 py-3">
                            duracion
                        </th>

                        {{-- <th scope="col" class="px-6 py-3">
                            <a href="{{ route('albumes.index', ['order' => 'distribuidora', 'order_dir' => order_dir($order == 'distribuidora', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Distribuidora {{ order_dir_arrow($order == 'distribuidora', $order_dir) }}
                            </a>
                        </th> --}}

                    </tr>
                </thead>
                <tbody>
                    @foreach ($album->temas as $tema)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a class="text-blue-500 blue" href="{{ route('temas.show', $tema) }}">
                                    {{$tema->nombre }}
                                </a>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a class="text-blue-500 blue" href="{{ route('temas.show', $tema) }}">
                                    {{$tema->anyo }}
                                </a>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a class="text-blue-500 blue" href="{{ route('temas.show', $tema) }}">
                                    {{$tema->intervalo()}}
                                </a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </section>
    <section>
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h3>
                    Duracion Total: {{$album->total()}}
                </3>
            </div>
        </div>

    </section>

</x-app-layout>
