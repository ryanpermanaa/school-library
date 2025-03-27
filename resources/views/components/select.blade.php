<div x-data="@if ($type === 'single-select') singleSelect( {{ json_encode($options) }}, @entangle($entangle) );
    @elseif ($type === 'multi-select') multiSelect( {{ json_encode($options) }}, @entangle($entangle)); @endif">

    <div class ="mt-1 relative min-w-full z-20" :class="{ 'z-30': open }">
        <button type="button" @click="open = !open"
            class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm">
            <span class="block truncate capitalize"
                x-text="Array.isArray(selectedOptions) ? (selectedOptions.length > 0 ? selectedOptions.join(', ') : '{{ $placeholder }}') : (selectedOptions || '{{ $placeholder }}')">
            </span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg x-show="selectedOptions.length == 0" class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <button class="absolute inset-y-0 right-0 items-center pr-2 cursor-pointer" type="button"
            @click="$wire.resetFilter('{{ $name }}')" x-show="selectedOptions.length > 0">
            <svg class="h-5 w-5 text-gray-400 z-10 cursor-pointer hover:text-primary" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <div x-show="open" @click.away="open = false"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base overflow-auto focus:outline-none sm:text-sm"
            style="display: none;">
            <template x-for="option in options" :key="option">

                <div @click="$wire.setFilter('{{ $name }}', option)"
                    class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-primary hover:text-white group">
                    <span x-text="option" :class="{ 'font-semibold': selectedOptions.includes(option) }"
                        class="block truncate capitalize"></span>

                    <span x-show="selectedOptions.includes(option.toLowerCase())"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-primary group-hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>

            </template>
        </div>
    </div>


</div>

<script>
    function multiSelect(options, selectedBinding) {
        return {
            open: false,
            options: options ?? ['Option 1', 'Option 2', 'Option 3'],
            selectedOptions: selectedBinding || [],
        }
    }

    function singleSelect(options, selectedBinding) {
        return {
            open: false,
            options: options ?? ['Option 1', 'Option 2', 'Option 3'],
            selectedOptions: selectedBinding || [],
        }
    }
</script>
