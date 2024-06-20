<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tableau de board
            </h2>
            <div>
                <x-link-button-primary link="{{ route('admin.workspace.create') }}">Créer un Workspace</x-link-button-primary>
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
                                    <h3 class="text-md font-medium pb-1">{{ $workspace->name }}</h3>
                                    <p class="text-gray-500 text-sm">XX utilisateurs | XX modules</p>
                                    <div class="absolute top-4 right-4">
                                        <a href="{{ route('admin.workspace.edit', $workspace) }}" class="normal-case text-sm font-medium">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 grid grid-cols-2">
                                    <a href="{{ route('admin.workspace.users', $workspace) }}"
                                       class="flex justify-center items-center text-center py-3 font-medium text-sm border-r border-gray-200 hover:bg-gray-50">
                                        Utilisateurs
                                    </a>
                                    <a href="#"
                                       class="flex justify-center items-center text-center py-3 font-medium text-sm hover:bg-gray-50">
                                        Modules
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
