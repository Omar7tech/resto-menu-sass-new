@props(['meta_title' => 'abc', 'meta_description'])
@section('seo')
  @if ($meta_description)
    <meta name="description" content="{{ $meta_description }}">
  @endif
@endsection