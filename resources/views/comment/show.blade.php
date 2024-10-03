<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                {{ $workspace->name }} / Module Commentaires
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

    @if(auth()->user()->is_admin)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="font-semibold text-sm pb-1">Urls Api module commentaire :</p>
                    <div class="flex items-center justify-between gap-1 mt-2">
                        <x-text-input type="text" class="block w-full text-gray-500 text-xs"
                                      :value="env('APP_URL') . '/api/comment/' . $workspace->id"/>
                        <x-secondary-button
                            type="button" data-copy="{{ env('APP_URL') . '/api/comment/' . $workspace->id }}"
                            onclick="copyToClipboard(this)"
                            style="padding-left: 12px; padding-right: 12px">
                            <i class="text-xs fas fa-copy text-gray-600 w-[12px] h-[16px]"></i>
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="@if(auth()->user()->is_admin) py-6 @else py-12 @endif">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="get" action="{{ route('comment.show', $workspace->slug) }}"
                          class="flex items-start md:items-end gap-4 flex-col md:flex-row">
                        <div class="w-full">
                            <x-input-label for="content" :value="__('Message')"/>
                            <x-text-input id="content" name="content" type="text" class="mt-1 block w-full"
                                          :value="old('content')" autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('content')"/>
                        </div>
                        <div class="w-full">
                            <x-input-label for="key" :value="__('Key')"/>
                            <x-text-input id="key" name="key" type="text" class="mt-1 block w-full"
                                          :value="old('key')"/>
                            <x-input-error class="mt-2" :messages="$errors->get('key')"/>
                        </div>
                        @if($request->get('content') || $request->get('key'))
                            <div>
                                <x-link-button-secondary link="{{ route('comment.show', $workspace->slug) }}">
                                    Réinitialiser
                                </x-link-button-secondary>
                            </div>
                        @endif
                        <x-primary-button type="submit">Rechercher</x-primary-button>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(count($comments) === 0)
                        <div class="text-center">
                            <p class="text-gray-500">Aucun commentaire trouvé</p>
                        </div>
                    @endif
                    <div class="space-y-4">
                        @foreach($comments as $comment)
                            <div class="border border-gray-200 rounded-lg">
                                <div class="flex justify-between gap-2 p-4">
                                    <div class="relative">
                                        <p class="text-gray-500 text-sm">“{{ $comment->content }}”</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <x-link-button-secondary target="_blank"
                                                                 link="{{ route('api.comment.show', $comment->key) }}"
                                                                 style="padding: 10px; width: 30px;height: 30px"
                                                                 class="flex justify-center items-center">
                                            <i class="fas fa-eye"></i>
                                        </x-link-button-secondary>
                                        <x-danger-button style="padding: 10px; width: 30px;height: 30px"
                                                         class="flex justify-center items-center" type="button"
                                                         data-modal-toggle="delete-modal-{{ $comment->id }}">
                                            <i class="fas fa-trash"></i>
                                        </x-danger-button>
                                        @include('partials.delete-modal', ['id' => $comment->id, 'route' => route('comment.destroy', $comment)])
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($count_comments > 20)
                        <div class="mt-6">
                            {{ $comments->links() }}
                        </div>
                    @endif
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
</script>
