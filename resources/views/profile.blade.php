@extends('layouts.master')
@section('content')
        <div class="container-fluid well" style="padding-left : 5%;">
            <div class="row">
                <div class="cold-md-2" >
                    <img src="{{ $user->photo}}" id="user_photo" width="140" height="140" class="img-circle">
                </div>
                <br>
                <label for="file-upload" style="border: 1px solid #ccc; display: inline-block; 
                    padding: 6px 12px;cursor: pointer; background: #007aff; 
                    border-radius: 4px; color: white;">
                    Changer la photo
                </label>
                <form method="POST" enctype="multipart/form-data" />
                @csrf
                <input accept="image/*" id="file-upload" name="photo" style="display: none;" 
                    onchange="uploaded(this.files[0])" type="file"/>
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                <img id="loading" src="img/loading.gif" style="display: none; z-index: 99999;">
                </form>
                <div id="myModal" class="modal">

                  <!-- The Close Button -->

                  <!-- Modal Content (The Image) -->
                  <img class="modal-content" id="img01">

                  <!-- Modal Caption (Image Text) -->
                  <div id="caption"></div>
                </div>
                <div class="cold-md-8">
                    <h2><strong>{{ $user->full_name }}</strong></h2>
                    <h3><strong>Username :</strong> {{ $user->username }}</h3>
                    <h3><strong>Service :</strong> {{ $user->service }}</h3>
                    <h3><strong>Poste :</strong> {{ $user->position }}</h3>
                </div>
            </div>
        </div>
      </section>
@endsection
@section('js_scripts')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function uploaded(image){
    if(image){
        var modal = document.getElementById("myModal");
        console.log(image);
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("loading");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
        upload_file(image,modal);
    
    }
    
}

function upload_file(image,modal){
    var data = new FormData();
    data.append('photo',image);
    data.append('user_id',document.getElementById('user_id').value);
    $.ajax({
        url:"/chnage_profile_photo",
        type:"POST", 
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        success:function(response) {
         console.log(response);
         //location.reload();
         modal.style.display = "none";
         location.reload();
        },
        error:function(response) {
         console.log(response);
         //location.reload();
         modal.style.display = "none";
         //location.reload();
        },

      });

      
}   
</script>
@endsection