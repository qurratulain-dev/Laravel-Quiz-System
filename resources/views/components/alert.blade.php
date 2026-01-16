 <div {{$attributes->merge(['class'=>'alert-dismissible fade show alert alert-'.$type])}} role="alert">
     {{ $message }}
     <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
 </div>
