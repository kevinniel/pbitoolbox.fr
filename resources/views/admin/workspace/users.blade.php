<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $workspace->name }} - Utilisateurs
            </h2>
            <div>
                <x-link-button-primary link="{{ route('admin.dashboard') }}">Retour</x-link-button-primary>
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
                                <div class="flex justify-between gap-4">
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
                                <div class="grid grid-cols-3 gap-4">
                                    @foreach($workspace->users as $user)
                                        <div class="border border-gray-200 rounded-lg">
                                            <div class="p-4 relative">
                                                <h3 class="text-md font-medium pb-1">{{ $user->name }}</h3>
                                                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                                                <div class="absolute top-4 right-4">
                                                    <form
                                                        action="{{ route('admin.workspace.removeUser', $workspace) }} "
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <button type="submit" class="normal-case text-sm font-medium">
                                                            Supprimer
                                                        </button>
                                                    </form>
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
