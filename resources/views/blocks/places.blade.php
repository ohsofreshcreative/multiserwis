<!--- places -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-places relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	
	<div class="__wrapper c-wide bg-white radius">
		<div class="__inside c-main section-py">
			<div class="__top">
				<h3 data-gsap-element="header" class="text-p-lighter text-center m-header">{{ strip_tags($g_places['header']) }}</h3>
				<p data-gsap-element="txt">{{ $g_places['text'] }}</p>
			</div>

			@if (!empty($r_places))
			@php
			$itemCount = count($r_places);
			$gridCols = 1;
			if ($itemCount == 2) $gridCols = 2;
			if ($itemCount == 3) $gridCols = 3;
			if ($itemCount >= 4) $gridCols = 4; // Twój dotychczasowy warunek
			$gridClass = $gridCols > 1 ? 'grid-cols-1 lg:grid-cols-' . $gridCols : 'grid-cols-1';
			@endphp

			<div class="grid {{ $gridClass }} gap-8 mt-10">
				@foreach ($r_places as $item)
				<div data-gsap-element="card" class="__card relative bg-secondary/5 radius p-10">
					@if (!empty($item['image']['url']))
					<img class="mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
					@endif
					<b class="">{{ $item['title'] }}</b>
					<p class="">{!! $item['txt'] !!}</p>
					@if(!empty($item['number']))
					<div class="flex items-center gap-2">
						<img src="/wp-content/uploads/2026/05/phone.svg" alt="Ikona telefonu" class="">
						<span class="">{{ $item['number'] }}</span>
					</div>
					@endif
					@if (!empty($item['navi']))
					<x-button
						:href="$item['navi']"
						target="_blank"
						variant="secondary"
						class="mt-6"
						data-gsap-element="btn">
						Włącz nawigację
					</x-button>
					@endif
				</div>



				@endforeach
			</div>
			@endif

		</div>
	</div>

</section>