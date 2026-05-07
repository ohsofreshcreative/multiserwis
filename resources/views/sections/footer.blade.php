<footer class="footer bg-primary overflow-hidden relative z-10">
	<div class="__wrapper c-main relative z-10">
		<div class="__top flex flex-col md:flex-row justify-between gap-6 mt-20">
			<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] ?? 'Logo' }}" class="relative w-auto max-w-46">

		</div>

		<div class="__widgets border-t border-primary-lighter grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-1 md:gap-6 pt-10 pb-36 mt-12">
			@for ($i = 1; $i <= 4; $i++)
				@if (is_active_sidebar('sidebar-footer-' . $i))
				<div>@php(dynamic_sidebar('sidebar-footer-' . $i))</div>
		@endif
		@endfor
	</div>

	<img class="__bg absolute -right-20 -bottom-60 opacity-50 scale-120 pointer-events-none" src="/wp-content/uploads/2026/01/plant-footer.svg" />
	</div>

	<div class="c-main flex flex-col md:flex-row justify-between gap-6 py-10 footer-bottom border-t border-primary-lighter">
		<p class="text-white">Copyright &copy;{{ date('Y') }} <?php echo get_bloginfo('name'); ?>. All Rights Reserved</p>
		<p class="flex text-white gap-2">Designed &amp; Developed by
			<a target="_blank" rel="nofollow" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="/wp-content/themes/multiserwis/resources/images/ohsofresh.svg"></a>
		</p>
	</div>

	<img class="__bg absolute top-0 left-0 opacity-5 pointer-events-none" src="/wp-content/uploads/2026/01/shape-footer.svg" />
	</div>
</footer>