@props([
    'title'=> ''
])

<div class="card shadow">
     @if ($title)
         <div class="card-header text-center">
         <h3>{{$title}}</h3>
     </div>
     @endif

     <div class="card-body">
        {{ $slot }}
     </div>
</div>
