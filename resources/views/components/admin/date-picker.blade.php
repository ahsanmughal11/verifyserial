@props([
    'name',
    'label' => '',
    'value' => '',
    'showTime' => true,
])

@php
    $componentId = 'dp-' . str_replace(['[', ']', '.'], '-', $name) . '-' . uniqid();
    $dateVal = $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : '';
    $timeVal = $value && $showTime ? \Carbon\Carbon::parse($value)->format('H:i') : '';
@endphp

<div x-data="{
    open: false,
    date: '{{ $dateVal }}',
    time: '{{ $timeVal }}',
    showTime: {{ $showTime ? 'true' : 'false' }},
    currentMonth: {{ $dateVal ? \Carbon\Carbon::parse($value)->month - 1 : 'new Date().getMonth()' }},
    currentYear: {{ $dateVal ? \Carbon\Carbon::parse($value)->year : 'new Date().getFullYear()' }},
    days: [],
    monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
    get displayValue() {
        if (!this.date) return '';
        const d = new Date(this.date + 'T00:00:00');
        const opts = { year: 'numeric', month: 'short', day: 'numeric' };
        let str = d.toLocaleDateString('en-US', opts);
        if (this.showTime && this.time) str += ' ' + this.time;
        return str;
    },
    get combinedValue() {
        if (!this.date) return '';
        return this.date + (this.showTime && this.time ? 'T' + this.time : '');
    },
    buildDays() {
        this.days = [];
        const first = new Date(this.currentYear, this.currentMonth, 1);
        const startDay = first.getDay();
        const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
        for (let i = 0; i < startDay; i++) this.days.push(null);
        for (let d = 1; d <= daysInMonth; d++) this.days.push(d);
    },
    prevMonth() {
        this.currentMonth--;
        if (this.currentMonth < 0) { this.currentMonth = 11; this.currentYear--; }
        this.buildDays();
    },
    nextMonth() {
        this.currentMonth++;
        if (this.currentMonth > 11) { this.currentMonth = 0; this.currentYear++; }
        this.buildDays();
    },
    selectDay(d) {
        const m = String(this.currentMonth + 1).padStart(2, '0');
        const day = String(d).padStart(2, '0');
        this.date = this.currentYear + '-' + m + '-' + day;
        if (!this.showTime) this.open = false;
    },
    isToday(d) {
        if (!d) return false;
        const today = new Date();
        return d === today.getDate() && this.currentMonth === today.getMonth() && this.currentYear === today.getFullYear();
    },
    isSelected(d) {
        if (!d || !this.date) return false;
        const m = String(this.currentMonth + 1).padStart(2, '0');
        const day = String(d).padStart(2, '0');
        return this.date === this.currentYear + '-' + m + '-' + day;
    },
    init() { this.buildDays(); }
}" @click.outside="open = false" class="relative" id="{{ $componentId }}">

    @if($label)
        <label class="block mb-2 text-sm text-[#ccc] font-semibold">{{ $label }}</label>
    @endif

    {{-- Display input --}}
    <div @click="open = !open"
         class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white flex items-center justify-between cursor-pointer transition-all duration-300 hover:border-[#444] focus-within:border-[#ffd700]">
        <span :class="displayValue ? 'text-white' : 'text-[#666]'" x-text="displayValue || 'Select date...'"></span>
        <div class="flex items-center gap-2">
            <button x-show="date" @click.stop="date = ''; time = ''" type="button" class="text-[#666] hover:text-[#ff6b6b] bg-transparent border-none cursor-pointer p-0">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
            </button>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-[#888]">
                <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM9 10H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2z"/>
            </svg>
        </div>
    </div>

    {{-- Calendar dropdown --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute z-50 mt-1 bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg shadow-[0_8px_24px_rgba(0,0,0,0.5)] p-4 w-[300px]">

        {{-- Month/Year header --}}
        <div class="flex items-center justify-between mb-4">
            <button @click="prevMonth()" type="button" class="p-1.5 hover:bg-[#333] rounded transition-colors bg-transparent border-none cursor-pointer text-[#ccc]">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
            </button>
            <span class="text-sm font-semibold text-white" x-text="monthNames[currentMonth] + ' ' + currentYear"></span>
            <button @click="nextMonth()" type="button" class="p-1.5 hover:bg-[#333] rounded transition-colors bg-transparent border-none cursor-pointer text-[#ccc]">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
            </button>
        </div>

        {{-- Day headers --}}
        <div class="grid grid-cols-7 gap-0.5 mb-2">
            <template x-for="day in ['Su','Mo','Tu','We','Th','Fr','Sa']">
                <div class="text-center text-[10px] text-[#666] font-semibold uppercase py-1" x-text="day"></div>
            </template>
        </div>

        {{-- Days grid --}}
        <div class="grid grid-cols-7 gap-0.5">
            <template x-for="(d, i) in days" :key="i">
                <button x-show="d !== null"
                        @click="selectDay(d)"
                        type="button"
                        :class="{
                            'bg-[#ffd700] text-[#1a1a1a] font-bold': isSelected(d),
                            'text-white hover:bg-[#333]': !isSelected(d) && d,
                            'ring-1 ring-[#ffd700]': isToday(d) && !isSelected(d)
                        }"
                        class="w-9 h-9 rounded-md text-sm flex items-center justify-center cursor-pointer transition-all duration-150 bg-transparent border-none"
                        x-text="d">
                </button>
                <div x-show="d === null" class="w-9 h-9"></div>
            </template>
        </div>

        {{-- Time picker --}}
        <template x-if="showTime">
            <div class="mt-4 pt-3 border-t border-[#2a2a2a] flex items-center gap-3">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-[#888] flex-shrink-0"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                <input type="time" x-model="time" class="flex-1 py-2 px-3 bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-sm outline-none focus:border-[#ffd700]" />
            </div>
        </template>

        {{-- Done button --}}
        <button @click="open = false" type="button" class="w-full mt-3 py-2 bg-gradient-to-r from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md text-xs font-bold border-none cursor-pointer hover:opacity-90 transition-opacity">Done</button>
    </div>

    <input type="hidden" name="{{ $name }}" :value="combinedValue" />
</div>
