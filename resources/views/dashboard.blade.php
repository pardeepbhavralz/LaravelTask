<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .showData {
            display: flex;
            flex-direction: column;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header, .row {
            display: flex;
            padding: 10px;
            justify-content: space-between;
        }

        .header-item, .row-item {
            flex: 1;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        .header-item {
            font-weight: bold;
            background-color: #f7f7f7;
            color: #333;
        }

        .row-item {
            background-color: #fff;
        }

        .row-item:hover {
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .row:nth-child(even) .row-item {
            background-color: #f9f9f9;
        }

        .row-item:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        button.delete-user {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        button.delete-user:hover {
            background-color: #c0392b;
        }

        .add-user-link {
            margin-bottom: 20px;
            display: inline-block;
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
        }

        .add-user-link:hover {
            background-color: #27ae60;
        }

        @media (max-width: 768px) {
            .showData {
                flex-direction: column;
                width: 100%;
            }

            .header-item, .row-item {
                flex: none;
                width: 100%;
                text-align: left;
            }

            .header-item {
                background-color: #f7f7f7;
                font-size: 12px;
            }

            .row-item {
                font-size: 12px;
                padding: 8px;
            }

            button.delete-user {
                width: 100%;
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>

    <div id="manageUsers" class="department-manage" style="display:flex; cursor:pointer;">Manage-Department &nbsp;  
           <i class="fa fa-plus" style="font-size:22px"></i>
</div>

    <div class="filter-input" style="float:right; padding-right:4rem;">
         <input type="text" name="filter-input" class="filter-input" id="filter-input" placeholder="Enter any key">
    </div>

    <div class="create_newUser" style="padding-left:4rem;">
         <a href="{{route('user.add')}}" class="add-user-link" >Add New User Here</a>
    </div>

    <div class="showData">
        <div class="header">
            <div class="header-item">Serial No.</div>
            <div class="header-item">Name</div>
            <div class="header-item">Email</div>
            <div class="header-item">Phone</div>
            <div class="header-item">Address</div>
            <div class="header-item">Gender</div>
            <div class="header-item">Country</div>
            <div class="header-item">City</div>
            <div class="header-item">Department</div>
            <div class="header-item">Skills</div>
            <div class="header-item">Note</div>
            <div class="header-item">Action</div>
        </div>
        
        <div id="user-list" class="oneFullUser">
    @foreach ($showUserDashboard as $index => $user)
    <div class="row" id="user-{{ $user->id }}">
        <div class="row-item">{{ $index + 1 }}</div>
        <div class="row-item">{{ $user->name }}</div>
        <div class="row-item">{{ $user->email }}</div>
        <div class="row-item">{{ $user->phone }}</div>
        <div class="row-item">{{ $user->address }}</div>
        <div class="row-item">{{ $user->gender }}</div>
        <div class="row-item">{{ $user->country }}</div>
        <div class="row-item">{{ $user->city }}</div>
        <div class="row-item">{{ $user->department }}</div>
        <div class="row-item">{{ $user->skills }}</div>
        <div class="row-item">{{ $user->note }}</div>
        <div class="row-item">
            <button class="update-user" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
            <button class="delete-user" data-id="{{ $user->id }}">Delete</button>
        </div>
    </div>
    @endforeach
</div>

    </div>

<!-- // edit model open -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <class="modal-body" style="padding:1rem;">
          <!-- Form starts here -->

            <div class="mb-3">
              <label for="name" class="form-label">Name:</label>
              <input type="hidden"  id="user-id-update">
              <input type="text" id="editName" name="editName" class="form-control">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" id="editEmail" name="editEmail" class="form-control">
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone:</label>
              <input type="text" id="editPhone" name="editPhone" class="form-control">
            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Address:</label>
              <textarea id="editAddress" name="editAddress" class="form-control"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Gender:</label>
              <div>
                <input type="radio" id="editMale" name="editGender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="editFemale" name="editGender" value="female">
                <label for="female">Female</label>
                
              </div>
            </div>

            

            <div class="mb-3">
              <label for="country" class="form-label">Country:</label>
              <select id="editCountry" name="editCountry" class="form-select">
                <option value="">-- Select --</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="UK">UK</option>
                <option value="Australia">Australia</option>
                <option value="India">India</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="city" class="form-label">City:</label>
              <select id="editCity" name="editCity" class="form-select">
                <option value="">-- Select --</option>
                <option value="amritsar">Amritsar</option>
                <option value="delhi">Delhi</option>
                <option value="ropar">Ropar</option>
                <option value="mohali">Mohali</option>
                <option value="chandigarh">Chandigarh</option>
              </select>
            </div>

            <label for="department">Department</label>
    <select id="department" name="editdepartment" >
        <option value="">-- Select --</option>
        <option value="hr">HR</option>
        <option value="developer">Developer</option>
        <option value="designer">Designer</option>
        <option value="seo">SEO</option>
        <option value="bde">BDE</option>
    </select><br>


            <div class="mb-3">
              <label class="form-label">Skills:</label>
              <div>
                <input type="checkbox" id="html" name="editSkills[]" class="editSkills" value="HTML">
                <label for="html">HTML</label>
                <input type="checkbox" id="css" name="editSkills[]" class="editSkills" value="CSS">
                <label for="css">CSS</label>
                <input type="checkbox" id="javascript" name="editSkills[]" class="editSkills" value="JavaScript">
                <label for="javascript">JavaScript</label>
                <input type="checkbox" id="python" name="editSkills[]" class="editSkills" value="Python">
                <label for="python">Python</label>
              </div>
            </div>

            <div class="mb-3">
              <label for="note" class="form-label">Note:</label>
              <textarea id="editNote" name="editNote" class="form-control"></textarea>
            </div>

            <button class="update_button btn btn-primary" id="edit_id" type="submit">Submit</button>
          <!-- Form ends here -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      
 $(document).ready(function(){
          var update_ID = "";
var divUserID = "";
            // Delete user
            $('.delete-user').click(function(event){
                event.preventDefault();

                var userId = $(this).data('id');
                $.ajax({
                    url: 'user-delete/' + userId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: userId
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#user-' + userId).remove();
                        } else {
                            alert('User not found');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while deleting the user.');
                    }
                });
            })
            // End delete user


             // update user
             $('.update-user').click(function() {
              var edit_userId = $(this).data('id');
              $('#user-id-update').val(edit_userId);
              
              $.ajax({
                  url: '/edit-user/' + edit_userId,
                  type: 'GET',
                  data: {
                      _token: '{{ csrf_token() }}',
                      user_id: edit_userId
                  },
                  success: function(response) {
                      if (response.success) {
                          var user = response.user;
                          
                          $('#editName').val(user.name);
                          $('#editEmail').val(user.email);
                          $('#editPhone').val(user.phone);
                          $('#editAddress').val(user.address);
                          $('#editCountry').val(user.country);
                          $('#editCity').val(user.city);
                          $('#editdepartment').val(user.department);
                          $('#editNote').val(user.note);
                          $('#edit_id').val(user.id);
                          update_ID = user.id;
                          
                         var gender = user.gender;
                          if(gender === "male"){
                            document.getElementById("editMale").checked = true;
                          }else{
                            document.getElementById("editFemale").checked = true;
                          } 
                      } else {
                          alert('User not found');
                      }
                  },
                  error: function(error) {
                      alert('An error occurred: ' + error);
                  }
              });
          });




              $(document).on('click', '.update_button',function(){
              var update_ID =  $('#user-id-update').val();
               
                var data = {
                    _token: '{{ csrf_token() }}',  
                    editName: $('#editName').val(),  
                    editEmail: $('#editEmail').val(),
                    editPhone: $('#editPhone').val(),
                    editAddress: $('#editAddress').val(),
                    editGender: $('#editGender').val(),
                    editCountry: $('#editCountry').val(),
                    editCity: $('#editCity').val(),
                    editCity: $('#editdepartment').val(),
                    //editSkills: $('#editSkills').val(), 
                    editNote: $('#editNote').val()
                };

                $.ajax({
                    url: '/update-user/' + update_ID,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: data
                    },
                    success: function(response) {
                      console.log(response)
                        if (response.success) {
                            //$('#user-' + userId).remove();
                        } else {
                          alert('User not found');
                        }
                    }
                });


              
            });

            $(document).ready(function () {
    $('#filter-input').on('keyup', function () {
        var search = $(this).val();

        $.ajax({
            url: '{{ route("filter.results") }}',  
            type: 'GET',
            data: { search: search },
            success: function (response) {
                console.log(response); 

                if (response && response.users) {
                 
                    $('.row').hide();
                    $('#user-list').empty();
                    if (response.users.length > 0) {
                        response.users.forEach(function (user, index) {
                            var userRow = `
                                <div class="row" id="user-${user.id}">
                                    <div class="row-item">${index + 1}</div>
                                    <div class="row-item">${user.name}</div>
                                    <div class="row-item">${user.email}</div>
                                    <div class="row-item">${user.phone}</div>
                                    <div class="row-item">${user.address}</div>
                                    <div class="row-item">${user.gender}</div>
                                    <div class="row-item">${user.country}</div>
                                    <div class="row-item">${user.city}</div>
                                    <div class="row-item">${user.department}</div>
                                    <div class="row-item">${user.skills}</div>
                                    <div class="row-item">${user.note}</div>
                                    <div class="row-item">
                                        <button class="update-user" data-id="${user.id}" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                        <button class="delete-user" data-id="${user.id}">Delete</button>
                                    </div>
                                </div>
                            `;
                            $('#user-list').append(userRow);
                        });
                    } else {
                        $('#user-list').html('<p>No results found.</p>');
                    }
                } else {
                    console.log('No users found or response is malformed.');
                    $('#user-list').html('<p>No results found.</p>');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});

// ---->
$('#manageUsers').on('click', function(){
  alert('testtest');

});


});

       
    </script>

</body>
</html>
