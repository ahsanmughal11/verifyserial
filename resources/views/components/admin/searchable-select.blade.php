@props([
    'name',
    'label' => '',
    'options' => [],
    'selected' => [],
    'multiple' => true,
    'placeholder' => 'Search...',
])

@php
    $componentId = 'ss-' . str_replace(['[', ']', '.'], '-', $name) . '-' . uniqid();
    $selectedArray = is_array($selected) ? $selected : (array)$selected;
@endphp

<div x-data="{
    open: false,
    search: '',
    selected: @js($selectedArray),
    options: @js($options->map(fn($o) => ['id' => $o->id, 'name' => $o->name])->values()->all()),
    get filtered() {
        if (!this.search) return this.options;
        const s = this.search.toLowerCase();
        return this.options.filter(o => o.name.toLowerCase().includes(s));
    },
    isSelected(id) { return this.selected.includes(id); },
    toggle(id) {
        if (this.isSelected(id)) {
            this.selected = this.selected.filter(s => s !== id);
        } else {
            this.selected.push(id);
        }
    },
    getName(id) {
        const o = this.options.find(o => o.id === id);
        return o ? o.name : '';
    },
    remove(id) { this.selected = this.selected.filter(s => s !== id); }
}" class="relative" @click.outside="open = false" id="{{ $componentId }}">

    @if($label)
        <label class="block mb-2 text-sm text-[#ccc] font-semibold">{{ $label }}</label>
    @endif

    {{-- Selected chips + search input --}}
    <div @click="open = true; $nextTick(() => $refs.searchInput.focus())"
         class="w-full min-h-[48px] py-2 px-3 bg-[#151515] border border-[#2a2a2a] rounded-md text-white flex flex-wrap gap-2 items-center cursor-text transition-all duration-300 focus-within:border-[#ffd700] focus-within:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
        <template x-for="id in selected" :key="id">
            <span class="inline-flex items-center gap-1.5 bg-[rgba(255,215,0,0.15)] text-[#ffd700] text-xs font-medium px-2.5 py-1 rounded-full">
                <span x-text="getName(id)"></span>
                <button @click.stop="remove(id)" type="button" class="bg-transparent border-none text-[#ffd700] cursor-pointer hover:text-white p-0 leading-none text-sm">&times;</button>
            </span>
        </template>
        <input x-ref="searchInput"
               x-model="search"
               @focus="open = true"
               type="text"
               :placeholder="selected.length === 0 ? '{{ $placeholder }}' : ''"
               class="flex-1 min-w-[80px] bg-transparent border-none outline-none text-white text-sm p-1" />
    </div>

    {{-- Dropdown --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute z-50 w-full mt-1 bg-[#1a1a1a] border border-[#2a2a2a] rounded-md shadow-[0_8px_24px_rgba(0,0,0,0.5)] max-h-[200px] overflow-y-auto">
        <template x-for="option in filtered" :key="option.id">
            <div @click="toggle(option.id)"
                 :class="isSelected(option.id) ? 'bg-[rgba(255,215,0,0.1)] text-[#ffd700]' : 'text-[#ccc] hover:bg-[rgba(255,215,0,0.05)] hover:text-white'"
                 class="flex items-center gap-3 py-2.5 px-4 cursor-pointer transition-colors duration-150 text-sm">
                <span :class="isSelected(option.id) ? 'bg-[#ffd700] border-[#ffd700]' : 'border-[#555]'"
                      class="w-4 h-4 rounded border-2 flex items-center justify-center flex-shrink-0 transition-all duration-200">
                    <svg x-show="isSelected(option.id)" class="w-2.5 h-2.5 text-[#1a1a1a]" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                </span>
                <span x-text="option.name"></span>
            </div>
        </template>
        <div x-show="filtered.length === 0" class="py-4 px-4 text-center text-[#666] text-sm">No results found</div>
    </div>

    {{-- Hidden inputs --}}
    <template x-for="id in selected" :key="'input-'+id">
        <input type="hidden" :name="'{{ $name }}'" :value="id" />
    </template>
</div>
