@props(['menu'])
@section('seo')
  <meta name="description" content="{{ $menu->meta_description ?? $menu->name }}">
  <meta property="og:type" content="website" />
  <meta name="title" content="{{ $menu->meta_title ?? $menu->name . " - Menu" }}" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ $menu->meta_title ?? $menu->name . " - Menu" }}" />
  <meta property="og:description" content="{{ $menu->meta_description ?? $menu->name . " - Menu" }}" />
  <meta name="twitter:image"
    content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXQ8OVYtynRoctFQPmwPs_sjapHYq2sYy5Ag&s" />
  <meta property="og:image"
    content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXQ8OVYtynRoctFQPmwPs_sjapHYq2sYy5Ag&s" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta name="twitter:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="{{ $menu->name ?? "Restaurant Menu" }}" />
  <meta property="og:url" content="{{ url()->current() }}" />
@endsection