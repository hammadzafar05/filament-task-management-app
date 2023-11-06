<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Task') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex flex-col w-full">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-full">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 w-full">
                            <div class="flex flex-col w-full">
                                <form wire:submit.prevent="update" class="w-full">
                                    <div class="mb-4">
                                        <x-input-label for="title" :value="__('Title')" />
                                        <x-text-input wire:model="title" id="title" class="block mt-1 w-full"
                                            type="text" name="title" required autofocus autocomplete="title" />
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>

                                    <div class="mb-4">
                                        <x-input-label for="description" :value="__('Description')" />
                                        <textarea wire:model="description" id="description"
                                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" name="description"
                                            required></textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                    </div>


                                    <div class="mb-4">
                                        <x-input-label for="status" :value="__('Status')" />
                                        <select wire:model="status_id" id="status" class="block mt-1 w-full"
                                            name="status_id" required>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}"
                                                    @if ($status->id === $task->status_id) selected @endif>
                                                    {{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
                                    </div>

                                    <div class="mb-4">
                                        <x-input-label for="tags" :value="__('Tags')" />
                                        <select wire:model="tags" id="tags" class="block mt-1 w-full"
                                            name="tags" multiple>
                                            @foreach ($availableTags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    @if (in_array($tag->id, $task->tags->pluck('id')->all())) selected @endif>
                                                    {{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ml-4">
                                            {{ __('Update') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
