<div>
    <!-- File Input -->
    <input type="file" wire:model="photos" multiple>

    <!-- Progress Bar -->
    <div x-data="{ progress: @entangle('progress'), isUploading: @entangle('isUploading') }" x-show="isUploading">
        <div class="relative pt-1">
            <div class="flex mb-2 items-center justify-between">
                <div class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-indigo-600 bg-indigo-200">
                    Uploading
                </div>
                <div class="text-right">
                    <span class="text-xs font-semibold inline-block text-indigo-600" x-text="`${progress}%`"></span>
                </div>
            </div>
            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-indigo-200">
                <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500" :style="{ width: progress + '%' }"></div>
            </div>
        </div>
    </div>

    <!-- List of Uploaded Files -->
    <ul class="mt-4">
        @foreach ($savedFiles as $file)
            <li class="text-gray-700 dark:text-gray-300">
                {{ $file->file_name }}
            </li>
        @endforeach
    </ul>

    <!-- Trigger the file upload -->
    <button wire:click="uploadFiles" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">Upload</button>
</div>
