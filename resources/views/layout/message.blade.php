@foreach (['success','danger'] as $item)
    @if (session()->has($item))
    <div class="alert alert-{{$item}}">
       {{ session()->get($item) }}
    </div>
    @endif
@endforeach
