<section class="py-24 px-6 text-[rgb(var(--text-primary))]">
    <div class="max-w-7xl mx-auto">
        <div class="space-y-16">
            <div class="space-y-4">
                <h1 class="text-[clamp(5rem,10vw,12rem)] font-extralight leading-[0.85] tracking-[-0.02em] {{ $menu->category_title_custom_color ? '' : 'text-primary-color dark:text-primary-color' }}" @if($menu->category_title_custom_color && $menu->category_title_color) style="color: {{ $menu->category_title_color }}" @endif>
                    About Us
                </h1>
            </div>

            <div class="space-y-8">
                <div class="prose prose-xl about-us-prose max-w-none text-[rgb(var(--text-primary))]">
                    {!! $menu->aboutus_content !!}
                </div>
            </div>
        </div>
    </div>
</section>