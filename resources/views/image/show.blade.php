<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                {{ $workspace->name }} / Module Images
            </h2>
            <div>
                @if(auth()->user()->is_admin)
                    <x-link-button-secondary link="{{ route('admin.workspace.show', $workspace->slug) }}">Retour
                    </x-link-button-secondary>
                @else
                    <x-link-button-secondary link="{{ route('workspace.show', $workspace->slug) }}">Retour
                    </x-link-button-secondary>
                @endif
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
                            <form method="post" action="{{ route('image.store', ['slug' => $workspace->slug]) }}"
                                  class="mt-6 space-y-6"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="flex gap-4 justify-between w-full items-end flex-col md:flex-row">
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
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                            @if(count($images) === 0)
                                <div>
                                    <p class="text-gray-500">Aucune image trouvé</p>
                                </div>
                            @endif
                            @foreach($images as $image)
                                <article class="space-y-2.5">
                                    <div
                                        class="min-h-[280px] h-[280px] rounded-lg flex items-end w-full relative"
                                        style="background: linear-gradient(to bottom, transparent,rgba(0,0,0,0.8) 100%), url({{ asset($image->getImageUrl()) }}); background-repeat: no-repeat; object-fit: contain; background-position: center">
                                        <div class="px-6 py-4 w-full">
                                            <div class="absolute top-4 right-4 flex gap-2">
                                                <x-danger-button style="padding: 10px; width: 30px;height: 30px"
                                                                 class="flex justify-center items-center" type="button"
                                                                 data-modal-toggle="delete-modal-{{ $image->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </x-danger-button>
                                                @include('partials.delete-modal', ['id' => $image->id, 'route' => route('image.destroy', $image)])
                                            </div>
                                            <div class="flex gap-2 pb-2">
                                            <span
                                                class="text-gray-300 font-semibold text-sm">{{ $image->created_at->format('d M, Y')  }}</span>
                                                <span class="text-gray-300 font-semibold text-sm">|</span>
                                                <span
                                                    class="text-gray-300 font-semibold text-sm">{{ $image->user->name }}</span>
                                            </div>
                                            <h3 class="text-white text-xl font-bold">{{ $image->name }}</h3>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between gap-1">
                                        <x-text-input type="text" class="block w-full text-gray-500 text-xs"
                                                      :value="asset($image->getImageUrl())"/>
                                        <x-secondary-button
                                            type="button" data-copy="{{ asset($image->getImageUrl()) }}"
                                            onclick="copyToClipboard(this)"
                                            style="padding-left: 12px; padding-right: 12px">
                                            <i class="text-xs fas fa-copy text-gray-600 w-[12px] h-[16px]"></i>
                                        </x-secondary-button>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function copyToClipboard(element) {
        var text = element.getAttribute('data-copy');
        var input = document.createElement('input');
        input.setAttribute('value', text);
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);

        element.innerHTML = "<i class='text-xs fas fa-clipboard-check text-gray-600 w-[12px] h-[16px] text-primary'></i>";

        window.setTimeout(function () {
            element.innerHTML = "<i class='text-xs fas fa-copy text-gray-600 w-[12px] h-[16px]'></i>";
        }, 2000);
    }

    document.getElementById('image').addEventListener('change', function (e) {
        var fileName = e.target.files[0].name;
        var nameInput = document.getElementById('name');
        if (nameInput.value === '') {
            nameInput.value = fileName;
        }
    });
</script>
