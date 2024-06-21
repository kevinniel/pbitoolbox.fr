<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $workspace->name }} / Module Images
            </h2>
            <div>
                <x-link-button-primary link="{{ route('workspace.show', $workspace) }}">Retour</x-link-button-primary>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Ajouter une image
                                </h2>
                            </header>
                            <form method="post" action="{{ route('image.store', $workspace) }}" class="mt-6 space-y-6"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="flex gap-4 justify-between w-full items-end">
                                    <div class="w-full">
                                        <x-input-label for="name" :value="__('Nom')"/>
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                                      :value="old('name')" required autofocus
                                                      autocomplete="name"/>
                                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                                    </div>
                                    <div class="w-full space-y-4">
                                        <x-input-label for="image" :value="__('Fichier')"/>
                                        <x-text-input id="image" name="image" type="file"
                                                      class="mt-1 block w-full border-none shadow-none rounded-none"
                                                      :value="old('image')" required autofocus/>
                                        <x-input-error class="mt-2" :messages="$errors->get('image')"/>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <x-primary-button>Ajouter</x-primary-button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header class="pb-3">
                            <h2 class="text-lg font-medium text-gray-900">
                                Images
                            </h2>
                        </header>
                        <div class="grid grid-cols-4 gap-5">
                            @foreach($images as $image)
                                <div
                                    class="min-h-[280px] h-[280px] rounded-lg flex items-end w-full relative"
                                    style="background: linear-gradient(to bottom, transparent,rgba(0,0,0,0.8) 100%), url({{ asset($image->getImageUrl()) }}); background-repeat: no-repeat; object-fit: contain;">
                                    <div class="px-6 py-4 w-full">
                                        <form action="{{ route('image.destroy', $image) }}" method="post"
                                              class="absolute top-4 right-4">
                                            @csrf
                                            @method('delete')
                                            <x-secondary-button type="submit">X</x-secondary-button>
                                        </form>
                                        <div class="flex gap-2 pb-2">
                                            <span
                                                class="text-gray-300 font-medium text-sm">{{ $image->created_at->format('d M, Y')  }}</span>
                                            <span class="text-gray-300 font-medium text-sm">|</span>
                                            <span
                                                class="text-gray-300 font-medium text-sm">{{ $image->user->name }}</span>
                                        </div>
                                        <h3 class="text-white text-xl font-bold">{{ $image->name }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
