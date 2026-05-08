@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';

@endphp

<!--- category-posts -->

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="block-category-posts -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="c-main">
		<div class="grid">

			<div class="flex flex-col md:flex-row justify-between">
				@if($posts_settings['title'])
				<h2 data-gsap-element="title" class="text-h3">{{ $posts_settings['title'] }}</h2>
				@endif
				@if (!empty($posts_settings['button']))
				<a data-gsap-element="btn" class="second-btn" href="{{ $posts_settings['button']['url'] }}">{{ $posts_settings['button']['title'] }}</a>
				@endif
			</div>

			<div class="mt-10">
				@if(!empty($posts))
				@foreach($posts as $post)
				@php
				$thumbnail_url = $show_image && has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'large') : '';
				@endphp
				<a href="{{ get_permalink($post->ID) }}" class="relative h-full bg-white p-10">
					<div class="__content relative z-10">
						<h6 class="">{{ get_the_title($post->ID) }}</h6>
						<span class="text-sm block mt-1">
							{{ get_the_date('', $post->ID) }}
						</span>
						<p class="mt-2">{{ get_the_excerpt($post) }}</p>
					</div>
				</a>
				@endforeach
			</div>


			@else
			<div class="no-posts">
				Brak postów do wyświetlenia.
			</div>
			@endif
		</div>
	</div>
</div>
</div>