<div id="delete-modal-{{ $id }}" aria-hidden="true"
     class="hidden overflow-x-hidden overflow-y-auto fixed h-modal h-full top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-md px-4 min-h-full md:h-auto">
        <div class="bg-white rounded-lg shadow relative mt-32">
            <div class="flex justify-end p-2">
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="delete-modal-{{ $id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="space-y-8 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8">
                <h3 class="text-lg font-medium text-center text-gray-900">Êtes-vous sur de vouloir
                    supprimer ?</h3>
                <div class="flex gap-2 justify-between">
                    <x-secondary-button type="button" data-modal-toggle="delete-modal-{{ $id }}">
                        Annuler
                    </x-secondary-button>
                    <form action="{{ $route }}" method="post">
                        @csrf
                        @method('delete')
                        <x-danger-button type="submit">
                            Supprimer
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
