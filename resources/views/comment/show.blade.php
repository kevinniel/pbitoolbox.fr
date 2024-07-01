<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                {{ $workspace->name }} / Module Commentaires
            </h2>
            <div>
                <x-link-button-secondary link="{{ route('workspace.show', $workspace->slug) }}">Retour
                </x-link-button-secondary>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-4">
                        @foreach($comments as $comment)
                            <div class="border border-gray-200 rounded-lg">
                                <div>
                                    <div class="p-4 relative">
                                        <p class="text-gray-500 text-sm">“{{ $comment->content }}”</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
