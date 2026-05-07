@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- hero --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-hero relative {{ $sectionClass }} {{ $section_class }}">

	<div class=" __wrapper c-wide relative radius z-20 py-20" style="background-image:linear-gradient(rgba(5,7,54,0.5), rgba(5,7,54,0.5)), url('{{ $g_hero['image']['url'] }}'); background-size:cover; background-position:center;">
		<div class="__inside c-main grid grid-cols-1 md:grid-cols-2 gap-10">
			<div class="__content relative z-20 pt-10 pb-10 md:py-30">
				<h1 data-gsap-element="header" class="text-white bg-bg-brand">
					{{ $g_hero['title'] }}
				</h1>
				<div data-gsap-element="txt" class="text-h4 text-secondary-light">
					{!! $g_hero['txt'] !!}
				</div>
				@if (!empty($g_hero['button1']))
				<div class="inline-buttons m-btn">
					<a data-gsap-element="button" class="second-btn left-btn"
						href="{{ $g_hero['button1']['url'] }}"
						target="{{ $g_hero['button1']['target'] }}">
						{{ $g_hero['button1']['title'] }}
					</a>
					@if (!empty($g_hero['button2']))
					<a data-gsap-element="button" class="white-btn"
						href="{{ $g_hero['button2']['url'] }}"
						target="{{ $g_hero['button2']['target'] }}">
						{{ $g_hero['button2']['title'] }}
					</a>
					@endif
				</div>
				@endif
			</div>
			<div class="__calc relative z-20 self-center w-full max-w-md ml-auto bg-white/95 backdrop-blur p-6 md:p-8 rounded-2xl shadow-xl"
				x-data='msCurrencyCalc(@json($locations))'>

				@if(empty($locations))
				<p class="text-secondary-light">Brak danych walutowych. Uzupełnij „Kursy walut → Opcje".</p>
				@else
				{{-- Tryb: kupić / sprzedać --}}
				<div class="grid grid-cols-2 gap-2 mb-5">
					<button type="button"
						class="py-3 px-4 rounded-lg border font-bold transition"
						:class="mode === 'buy'  ? 'bg-primary text-white border-primary' : 'bg-white text-primary border-primary/30'"
						@click="mode = 'buy'">Chcę kupić</button>
					<button type="button"
						class="py-3 px-4 rounded-lg border font-bold transition"
						:class="mode === 'sell' ? 'bg-primary text-white border-primary' : 'bg-white text-primary border-primary/30'"
						@click="mode = 'sell'">Chcę sprzedać</button>
				</div>

				{{-- Placówka --}}
				<label class="block mb-1 text-sm font-bold">Placówka</label>
				<select x-model="locationSlug" class="w-full mb-4 border rounded-lg px-3 py-2">
					<template x-for="loc in locations" :key="loc.slug">
						<option :value="loc.slug" x-text="loc.name"></option>
					</template>
				</select>

				{{-- Waluta --}}
				<label class="block mb-1 text-sm font-bold">Waluta</label>
				<select x-model="currencyCode" class="w-full mb-4 border rounded-lg px-3 py-2">
					<template x-for="r in currentRates" :key="r.code">
						<option :value="r.code" x-text="r.code"></option>
					</template>
				</select>

				{{-- Kwota waluty --}}
				<label class="block mb-1 text-sm font-bold">
					<span x-text="mode === 'buy' ? 'Chcę kupić (kwota waluty)' : 'Chcę sprzedać (kwota waluty)'"></span>
				</label>
				<div class="relative mb-4">
					<input type="number" min="0" step="0.01" inputmode="decimal"
						x-model.number="amount"
						class="w-full border rounded-lg px-3 py-2 pr-16"
						placeholder="0,00">
					<span class="absolute right-3 top-1/2 -translate-y-1/2 font-bold text-secondary-light"
						x-text="currencyCode"></span>
				</div>

				{{-- Wynik --}}
				<div class="bg-primary/5 border border-primary/20 rounded-lg p-4">
					<div class="text-sm text-secondary-light mb-1">
						<span x-text="mode === 'buy' ? 'Zapłacisz' : 'Otrzymasz'"></span>
					</div>
					<div class="text-2xl font-bold">
						<span x-text="formattedResult"></span> PLN
					</div>
					<div class="text-xs text-secondary-light mt-1" x-show="rate > 0">
						Kurs: 1 <span x-text="currencyCode"></span> =
						<span x-text="rate.toFixed(4).replace('.', ',')"></span> PLN
					</div>
				</div>
				@endif
			</div>
		</div>

	</div>


</section>