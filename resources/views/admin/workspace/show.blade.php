<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                {{ $workspace->name }}
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
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-lg">
                            <a href="{{ route('image.show', $workspace->slug) }}">
                                <div class="p-4 relative">
                                    <h3 class="text-md font-medium pb-1">Images</h3>
                                    <p class="text-gray-500 text-sm">{{ count($workspace->images) }} Images</p>
                                </div>
                            </a>
                        </div>
                        <div class="border border-gray-200 rounded-lg">
                            <a href="{{ route('comment.show', $workspace->slug) }}">
                                <div class="p-4 relative">
                                    <h3 class="text-md font-medium pb-1">Commentaires</h3>
                                    <p class="text-gray-500 text-sm">{{ count($workspace->comments) }} Commentaires</p>
                                </div>
                            </a>
                        </div>
                        <div class="border border-gray-200 rounded-lg">
                            <div>
                                <div class="p-4 relative">
                                    <h3 class="text-md font-medium pb-1">Statistiques</h3>
                                    <p class="text-gray-500 text-sm">{{ count($workspace->stats) }}
                                        Statistiques</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
