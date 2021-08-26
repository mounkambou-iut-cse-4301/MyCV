<div class="bg-secondary rounded-3 p-4 mb-4">
  <div class="d-block d-sm-flex align-items-center">                                   
      @if(getImage())
         <img
             class="d-block rounded-circle mx-sm-0 mx-auto mb-3 mb-sm-0"
              src="{{asset('storage/images/'.getImage())}}" alt="{{getName()}}" width="50" >
        @endif
        <div class="ps-sm-3 text-center text-sm-start">
        <button class="btn btn-light shadow btn-sm mb-2" type="button"> <a href="{{route('changer_image')}}" class="text-decoration-none"><i class="ai-refresh-cw me-2"></i>Changer l'image</a> </button>
          <div class="p mb-0 fs-ms text-muted">Téléchargez une image jpeg, jpg, gif, svg, png. 300 x 300.</div>
          </div>
    </div>
 </div>