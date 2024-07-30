<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                {{ $workspace->name }} / Modules
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
                    <form action="{{ route('admin.authorisation.update', $workspace) }}" method="post"
                          class="space-y-4">
                        @csrf
                        @method('put')
                        <div class="border border-gray-200 rounded-lg">
                            <label for="can_access_image" class="flex items-center justify-between p-5">
                                <span class="ms-2 text-gray-600">Module Images</span>
                                <input id="can_access_image" type="checkbox"
                                       class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary w-6 h-6"
                                       name="can_access_image" @checked($workspace->can_access_image)>
                            </label>
                        </div>
                        <div class="border border-gray-200 rounded-lg">
                            <label for="can_access_comment" class="flex items-center justify-between p-5">
                                <span class="ms-2 text-gray-600">Module Commentaires</span>
                                <input id="can_access_comment" type="checkbox"
                                       class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary w-6 h-6"
                                       name="can_access_comment" @checked($workspace->can_access_comment)>
                            </label>
                        </div>
                        <div>
                            <x-primary-button type="submit">Enregistrer</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
