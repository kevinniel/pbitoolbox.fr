<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tableau de board
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-4">
                        @foreach($workspaces as $workspace)
                            <div class="border border-gray-200 rounded-lg">
                                <a href="{{ route('workspace.show', $workspace->slug) }}">
                                    <div class="p-4 relative">
                                        <h3 class="text-md font-medium pb-1">{{ $workspace->name }}</h3>
                                        <p class="text-gray-500 text-sm">XX utilisateurs | XX modules</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
