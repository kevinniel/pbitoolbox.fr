<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                {{ $workspace->name }} / Utilisateurs
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
                    <div class="max-w-3xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Ajouter un utilisateur
                                </h2>
                            </header>
                            <form method="post" action="{{ route('admin.workspace.addUser', $workspace) }}"
                                  class="mt-6 space-y-6">
                                @csrf
                                <div class="flex justify-between gap-4 flex-col md:flex-row">
                                    <div class="w-full">
                                        <x-input-label for="name" :value="__('Nom')"/>
                                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                                      :value="old('name')" required autofocus
                                                      autocomplete="name"/>
                                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="email" :value="__('Email')"/>
                                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                                      :value="old('email')" required autofocus
                                                      autocomplete="email"/>
                                        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Utilisateurs
                                </h2>
                            </header>
                            <div class="mt-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($workspace->users as $user)
                                        <div class="border border-gray-200 rounded-lg">
                                            <div class="p-4 relative">
                                                <h3 class="text-md font-medium pb-1">{{ $user->name }}</h3>
                                                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                                                <div class="absolute top-2 right-4">
                                                    <button type="button"
                                                                     data-modal-toggle="delete-modal-{{ $user->id }}">
                                                        <i class="fas fa-times text-gray-400 duration-200 hover:text-gray-700"></i>
                                                    </button>
                                                    @include('partials.delete-modal', ['id' => $user->id, 'route' => route('admin.workspace.removeUser', ['workspace' => $workspace, 'user' => $user])])
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
