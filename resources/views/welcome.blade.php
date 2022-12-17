<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS and js  -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>test kerjaan !</title>
  </head>
  <body>


    <div class="container">
       
            <br>
            <h1> filter list </h1>
            <div class="input-group mb-3">
                <input type="text" class="form-control"  id="myInput" placeholder="cari sesuatu disini" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">find it</span>
                </div>
            </div>
      </div>


    <div class="container">
        <h1> Input data  </h1>
          <form name = "formreg" action="/tambah" action="post" onsubmit="return(validateForm())"> 
            @csrf
            <div class="form-group">
       
                <label for="inputnama">Nama </label>
                <input type="text" class="form-control" id="nama"  name="nama" required="required" placeholder="Enter Name">
            </div>
            <br>
            <!--  -->
            
            <div class="form-group">
                <label for="Input kelamin">Jenis kelamin :&emsp; </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  name="kelamin" id="kelamin" class="kelamin" value="pria">
                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kelamin" id="kelamin" class="kelamin" value="Wanita">
                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                  </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
              <label for="Input hobi">hobi : </label>
              </div>
              <div class="col-10">
                @foreach($hobi as $h)
                <div class="form-check-label">
                  
                    <input class="form-check-input" name="hobi[]" id="hobi[]" class="hobi" type="checkbox" value="{{$h->hobi}}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    {{$h->hobi}}
                    </label>
                </div>
                @endforeach
              </div>
            </div>
            <!--  -->
            <br>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required="required" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">email tidak akan pernah di share </small>
            </div>
            
            <!--  -->
            <br>
            <div class="form-group">
                <label for="exampleInputEmail1">Username </label>
                <input type="text" class="form-control" id="ID_Username" name="username" required="required" placeholder="Enter username">
              </div>
            
            <!--  -->  
            <br>
            <div class="form-group">
              <label for="input no hp">No Handphone</label>
              <input type="number" class="form-control" id="phone" name="phone" required="required" placeholder="masukan nomor hp anda">
            </div>
            

            <!--  -->
            <br>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            

            <br>
            <button id="submit"  type="submit" class="btn btn-primary">Submit</button>
            <button id="reset" type="reset" class="btn btn-warning">Reset</>
          </form>
    </div>
    <br>

    <div class="container">

    <h1> list table </h1>
    <table class="table table-bordered">
      <thead>
        <tr  >
          <th>Nama</th>
          <th>username</th>
          <th>email</th>
          <th>no hp</th>
          <th>Hobi</th>
          <th>kelamin</th>
          <th>password hash</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody id="myTable" >
        @foreach($users as $u)
        <tr id="index_{{ $u->id }}" >
            <td>{{ $u->name}}</td>
            <td>{{ $u->username}}</td>
            <td>{{ $u->email}}</td>
            <td>{{ $u->no_hp}}</td>
            <td>{{ $u->hobi}}</td>
            <td>{{ $u->Kelamin}}</td>
            <td>{{ $u->password}}</td>
            <td>
              <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $u->id }}" class="btn btn-danger btn-sm">DELETE</a>
            <td>
        <tr>
        @endforeach
      </tbody>
    </table>
    </div>
    <script>
      //button create post event
      $('body').on('click', '#btn-delete-post', function () {
  
          let post_id = $(this).data('id');
          let token   = $("meta[name='csrf-token']").attr("content");
  
          Swal.fire({
              title: 'Apakah Kamu Yakin?',
              text: "ingin menghapus data ini!",
              icon: 'warning',
              showCancelButton: true,
              cancelButtonText: 'TIDAK',
              confirmButtonText: 'YA, HAPUS!'
          }).then((result) => {
              if (result.isConfirmed) {
  
                  console.log('test');
  
                  //fetch to delete data
                  $.ajax({
  
                      url: `/hapus/${post_id}`,
                      type: "GET",
                      cache: false,
                      data: {
                          "_token": token
                      },
                      success:function(response){ 
  
                          //show success message
                          Swal.fire({
                              type: 'success',
                              icon: 'success',
                              title: 'sukses',
                              showConfirmButton: false,
                              timer: 3000
                          });
  
                     $(`#index_${post_id}`).remove();
                      }
                  });
  
                  
              }
          })
          
      });
  </script>
  
<script>
  function validateForm() {
  let upload = true;
  let totalerr= "";
  let password = document.forms["formreg"]["password"].value;
  let username = document.forms["formreg"]["username"].value;
  let checkusername =/\s/g.test(username);
  let name = document.forms["formreg"]["nama"].value;
  let name2 = name.toUpperCase();
  let name3 = /\d/.test(name);
  let kelamin = document.forms["formreg"]["kelamin"].value;
  // let hobby = $('input:checkbox:checked.hobi').map(function(){
  //       return this.value; }).get().join(", ");
  var checkboxes = document.getElementsByName('hobi[]');
  var hobi = "";
  for (var i=0, n=checkboxes.length; i<n; i++) 
    {
        if (checkboxes[i].checked) 
        {
            hobi += ", "+checkboxes[i].value;
        }
    }
  

  if(name3 == true){
    upload = false;
    totalerr += "jangan masukan angka di field nama! ";

  }
  if (hobi == "") {
    upload = false;
    totalerr += "isi hobi anda, ";

  }
  if (kelamin == "") {
    upload = false;
    totalerr += "isi gender anda, ";
  }
  
  if (name.charAt(0) != name2.charAt(0)) {
    upload = false;
    totalerr += "huruf depan harus besar, ";
  }
  if (password.length <6 ) {
    upload = false;
    totalerr += "Password must be atleast 6 characters, ";
  }
  if (username.length >10 ) {
    upload = false;
    totalerr += "username must be less than 10 characters, ";
  }
  if (checkusername == true) {
    upload = false;
    totalerr += "username tidak boleh ada spasi, ";
  }
  if (upload == false) {
        Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: totalerr,
                });
    return false;
  }else {
    Swal.fire({
      type: 'success',
      icon: 'success',
      title: 'sukses',

      });
      sleep(5000);
      return true;
  }
}

</script>


<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    // function pilih(){
    //     var name = $('#ID_nama').val();
    //     var username = $('#username').val();
    //     var email = $('#email').val();
    //     var no_hp = $('#phone').val();
    //     var kelamin = $('#kelamin').val();
    //     var password = $('#password').val();
    //     var hobby = $('input:checkbox:checked.hobi').map(function(){
    //     return this.value; }).get().join(",");
    //     if (password.length<7){
    //         alert("Password minimal 7 karakter.");
    //         window.location.reload();
            
    //     }
    //   }; 
    
  
      


</script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    









  -->
  </body>
</html>