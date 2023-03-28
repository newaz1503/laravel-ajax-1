<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel Ajax CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
     <div class="container py-5">
        <h4 class="text-center">
            <span id="addUser">Add New User</span>
            <span id="updateUser">Update User</span>
        </h4>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                        <span class="text-danger" id="nameErr"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" id="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                        <span class="text-danger" id="emailErr"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="text" id="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone">
                        <span class="text-danger" id="phoneErr"></span>
                    </div>
                    <input type="hidden" id="user_id">
                    <div class="mb-3">
                        <button type="button" id="addBtn" onclick="storeUser()" class="btn btn-primary btn-sm">Submit</button>
                        <button type="button" id="updateBtn" class="btn btn-primary btn-sm" onclick="updateUser()">Update</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- table --}}
       <div class="row justify-content-center py-5">
            <div class="col-lg-8">
                 <table class="table">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Action</td>
                          </tr>
                      </thead>
                      <tbody>


                      </tbody>
                    </table>
            </div>
       </div>

    </div>
         <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
        <script>
            $('#addUser').show();
            $('#addBtn').show();
            $('#updateUser').hide();
            $('#updateBtn').hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //===== clear input
            function clearField(){
                $('#name').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#nameErr').text('');
                $('#emailErr').text('');
                $('#phoneErr').text('');
            }
            //===== get all user
            function all_user(){
                $.ajax({
                    type:"GET",
                    url:"/all-user",
                    success: function(res){
                        let user = ""
                        $.each(res, function(key, value){
                            user += "<tr>"
                            user += "<td>"+value.id+"</td>"
                            user += "<td>"+value.name+"</td>"
                            user += "<td>"+value.email+"</td>"
                            user += "<td>"+value.phone+"</td>"
                            user += "<td>"
                                user += "<button type='button' class='btn btn-primary btn-sm' onclick='editUser("+value.id+")'>Edit</button>"
                                user += "<button type='button' class='btn btn-danger btn-sm' onclick='deleteUser("+value.id+")'>Delete</button>"
                            user += "</td>"
                            user += "</tr>"
                        })
                        $("tbody").html(user);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
            all_user();

            //====store user
            function storeUser(){
                let name = $('#name').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                $.ajax({
                    type: "POST",
                    url: "/user-store",
                    data: {
                        name: name,
                        email: email,
                        phone: phone
                    },
                    success: function(res){
                        all_user();
                        clearField();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: 'User Stored Successfully'
                            })

                    },
                    error: function(error){
                        $('#nameErr').text(error.responseJSON.errors.name);
                        $('#emailErr').text(error.responseJSON.errors.email);
                        $('#phoneErr').text(error.responseJSON.errors.phone);

                    }
                })
            }

            // edit user
          function editUser(id){
                $.ajax({
                    type: "GET",
                    url:"user-edit/"+id,
                    success: function(res){
                         $('#user_id').val(res.id)
                         $('#name').val(res.name);
                         $('#email').val(res.email);
                         $('#phone').val(res.phone);
                         $('#addUser').hide();
                        $('#addBtn').hide();
                        $('#updateUser').show();
                        $('#updateBtn').show();
                    }
                })
          }
          function updateUser() {
            let id = $('#user_id').val();
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();

            $.ajax({
                type: "POST",
                url:"/user-update/"+id,
                data: {
                    name: name,
                    email: email,
                    phone: phone
                },
                success: function(res){
                    all_user();
                    clearField();
                    $('#addUser').show();
                    $('#addBtn').show();
                    $('#updateUser').hide();
                    $('#updateBtn').hide();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'User Updated Successfully'
                        })
                },
                error: function(error){
                    $('#nameErr').text(error.responseJSON.errors.name);
                    $('#emailErr').text(error.responseJSON.errors.email);
                    $('#phoneErr').text(error.responseJSON.errors.phone);

                }
            })
           }
           //===== delete user
           function deleteUser(id){
            let result = confirm('Are you sure?!!')
            if(result){
                $.ajax({
                    type: "GET",
                    url:"user-delete/"+id,
                    success: function(res){
                        all_user();
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'User Deleted Successfully'
                        })
                    }
               });
            }else{
                return false;
            }

           }


        </script>


    </body>
</html>
