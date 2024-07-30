<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                Tableau de board
            </h2>
            <div>
                <x-link-button-primary link="{{ route('admin.workspace.create') }}">Créer un Workspace
                </x-link-button-primary>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($workspaces as $workspace)
                            <div class="border border-gray-200 rounded-lg">
                                <div class="p-4 relative">
                                    <a href="{{ route('admin.workspace.show', $workspace->slug) }}" class="text-md pb-1 font-bold">{{ $workspace->name }}</a>
                                    <p class="text-gray-500 text-sm">{{ $workspace->users_count }} utilisateurs | 3
                                        modules</p>
                                    <div class="absolute top-4 right-4">
                                        <a href="{{ route('admin.workspace.edit', $workspace) }}"
                                           class="normal-case text-sm font-medium opacity-40 hover:opacity-100">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                                <div class="px-4 mb-4">
                                    <p class="font-semibold text-sm pb-1">Api module :</p>
                                    <p class="text-sm text-gray-500">Commentaire : {{ env('APP_URL') . '/comment/' . $workspace->id }}</p>
                                    <p class="text-sm text-gray-500">Statistique : {{ env('APP_URL') . '/stat/' . $workspace->id }}</p>
                                </div>
                                <div class="border-t border-gray-200 grid grid-cols-2">
                                    <a href="{{ route('admin.workspace.users', $workspace) }}"
                                       class="flex justify-center items-center text-center py-3 font-medium text-sm border-r border-gray-200 hover:bg-gray-50">
                                        <i class="fas fa-users mr-2 text-gray-600"></i> Utilisateurs
                                    </a>
                                    <a href="{{ route('admin.authorisation.show', $workspace) }}"
                                       class="flex justify-center items-center text-center py-3 font-medium text-sm hover:bg-gray-50">
                                        <i class="fas fa-lock mr-2 text-gray-600"></i> Modules
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
