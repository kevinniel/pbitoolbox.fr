<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                Modifier un Workspace
            </h2>
            <div>
                <x-link-button-secondary link="{{ route('admin.dashboard') }}">Retour</x-link-button-secondary>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Modifier un Workspace
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    Le nom du workspace doit être unique. Il sera visible via l'url par les autres
                                    utilisateurs.
                                </p>
                            </header>
                            <form method="post" action="{{ route('admin.workspace.update', $workspace) }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')
                                <div>
                                    <x-input-label for="name" :value="__('Nom')"/>
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                                  :value="old('name', $workspace->name)" required autofocus
                                                  autocomplete="name"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                                </div>
                                <div class="flex items-center gap-4">
                                    <x-primary-button>Modifier</x-primary-button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
