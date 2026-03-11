@section('seo')
  <meta name="description" content="{{ $menu->meta_description ?? $menu->name }}">
  <meta property="og:type" content="website" />
  <meta name="title" content="{{ $menu->meta_title ?? $menu->name . " - Menu" }}">

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ $menu->meta_title ?? $menu->name . " - Menu" }}" />
  <meta property="og:description" content="{{ $menu->meta_description ?? $menu->name . " - Menu" }}" />

  {{-- OG Image: Check if external or uploaded --}}
  @if ($menu->is_og_image_external && $menu->og_image_external_link)
    <meta property="og:image" content="{{ $menu->og_image_external_link }}" />
    <meta name="twitter:image" content="{{ $menu->og_image_external_link }}" />
  @else
    <meta property="og:image" content="{{ $menu->getFirstMediaUrl('og_image', 'og_image') ?: asset('images/default-og.jpg') }}" />
    <meta name="twitter:image" content="{{ $menu->getFirstMediaUrl('og_image', 'og_image') ?: asset('images/default-og.jpg') }}" />
  @endif

  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta name="twitter:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="{{ $menu->name ?? "Restaurant Menu" }}" />
  <meta property="og:url" content="{{ url()->current() }}" />

  {{-- Favicon: Check if external or uploaded --}}
  @if ($menu->is_favicon_image_external && $menu->favicon_external_link)
    <link rel="icon" type="image/x-icon" href="{{ $menu->favicon_external_link }}">
  @else
    <link rel="icon" type="image/x-icon" href="{{ $menu->getFirstMediaUrl('favicon', 'favicon') ?: asset('favicon.ico') }}">
  @endif
@endsection