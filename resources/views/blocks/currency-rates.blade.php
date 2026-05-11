@php
$sectionClass = $nomt ? ' !mt-0' : '';
$g = $g_rates;
@endphp

<section
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-currency-rates relative pt-14 {{ $sectionClass }} {{ $section_class }}">

	<div class="c-main">

		@if(empty($locations))
		<p class="text-secondary-light">Brak danych — dodaj placówkę i wgraj plik w „Kursy walut → Opcje".</p>
		@else
		<div class="js-currency-rates" data-currency-rates>

			<div class="__top flex justify-between">
				@if(!empty($g['title']))
				<h2 class="text-h2 mb-4">{{ $g['title'] }}</h2>
				@endif
				@if(count($locations) > 1)
				<div class="mb-6">
					<label class="block font-bold" for="currency-location">Kursy dla</label>
					<select
						id="currency-location"
						class="js-currency-location border rounded px-4 py-2"
						data-currency-select>
						@foreach($locations as $i => $loc)
						<option value="{{ $loc['slug'] ?? $i }}">{{ $loc['name'] ?? 'Placówka '.($i+1) }}</option>
						@endforeach
					</select>
				</div>
				@endif
			</div>

			@foreach($locations as $i => $loc)
			<div
				class="js-currency-panel {{ $i === 0 ? '' : 'hidden' }}"
				data-currency-panel="{{ $loc['slug'] ?? $i }}">
				<table class="w-full text-left border-collapse">
					<thead>
						<tr class="border-b">
							<th class="py-3 px-4">{{ $g['col_code'] ?? 'Waluta' }}</th>
							<th class="py-3 px-4">{{ $g['col_buy']  ?? 'Kupno' }}</th>
							<th class="py-3 px-4">{{ $g['col_sell'] ?? 'Sprzedaż' }}</th>
						</tr>
					</thead>
					<tbody>
						@forelse($loc['rates'] ?? [] as $r)
						@php $info = \App\ms_currency_info($r['code']); @endphp
						<tr class="border-b">
							<td class="py-3 px-4">
								<div class="flex items-center gap-3">
									@if($info['flag'])
									<img src="{{ $info['flag'] }}"
										alt="{{ $info['code'] }}"
										width="28" height="20"
										class="rounded-full aspect-square object-cover shrink-0"
										loading="lazy">
									@endif
									<span class="font-bold">{{ $info['code'] }}</span>
									<span class="text-secondary-light">{{ $info['name'] }}</span>
								</div>
							</td>
							<td class="py-3 px-4">{{ number_format($r['buy'],  4, ',', ' ') }}</td>
							<td class="py-3 px-4">{{ number_format($r['sell'], 4, ',', ' ') }}</td>
						</tr>
						@empty
						<tr>
							<td colspan="3" class="py-3 px-4">Brak danych dla tej placówki.</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			@endforeach
		</div>

		@if($updated_at)
		<p class="mt-4 text-sm text-secondary-light">
			Aktualizacja: {{ \Carbon\Carbon::parse($updated_at)->format('d.m.Y H:i') }}
		</p>
		@endif

		@endif
	</div>
</section>