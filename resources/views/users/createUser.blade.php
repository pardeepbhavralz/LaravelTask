
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            padding: 20px;
            color: #333;
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 40px;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #2c3e50;
        }

        input[type="text"], input[type="email"], input[type="radio"], input[type="checkbox"], select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        input[type="radio"], input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
        }

        .checkbox-group label {
            margin-right: 15px;
        }

        #emailError {
            color: red;
            font-size: 12px;
        }
    
        .submit-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        .showUsers {
            margin-bottom: 20px;
            float: right;
        }

        .showUsers a {
            font-size: 16px;
            color: #3498db;
            text-decoration: none;
            padding: 10px;
            border: 1px solid #3498db;
            border-radius: 4px;
        }

        .showUsers a:hover {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:8000/user-create");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// Additional logic for handling POST requests can follow
?>
<h2>User Registration Form</h2>
    <div class="showUsers">
        <a href="/dashboard">View All</a>
    </div>

    <div class="form-container">
        <form action="{{route('create.user')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span id="emailError" class="error"></span>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
          

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label>

            <label for="country">Country:</label>
            <select id="country" name="country" required>
                <option value="">-- Select --</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="UK">UK</option>
                <option value="Australia">Australia</option>
                <option value="India">India</option>
            </select>

            <label for="city">City:</label>
            <select id="city" name="city" required>
                <option value="">-- Select --</option>
                <option value="amritsar">Amritsar</option>
                <option value="delhi">Delhi</option>
                <option value="ropar">Ropar</option>
                <option value="mohali">Mohali</option>
                <option value="chandigarh">Chandigarh</option>
            </select>

            <label>Skills:</label>
            <div class="checkbox-group">
                <input type="checkbox" id="html" name="skills[]" value="HTML">
                <label for="html">HTML</label>

                <input type="checkbox" id="css" name="skills[]" value="CSS">
                <label for="css">CSS</label>

                <input type="checkbox" id="javascript" name="skills[]" value="JavaScript">
                <label for="javascript">JavaScript</label>

                <input type="checkbox" id="python" name="skills[]" value="Python">
                <label for="python">Python</label>
            </div>

            <label for="department">Department:</label>
            <select id="department" name="department" required>
                <option value="">-- Select --</option>
                <option value="hr">HR</option>
                <option value="developer">Developer</option>
                <option value="designer">Designer</option>
                <option value="seo">SEO</option>
                <option value="bde">BDE</option>
            </select>

            <label for="note">Note:</label>
            <textarea id="note" name="note" rows="4"></textarea>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var emailInput = $('#email');
    var phoneInput = $('#phone');

    emailInput.on('keyup', function() {
        $.ajax({
            url: '{{ route("valid-email") }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                emailInput: emailInput.val(),
                phoneInput: phoneInput.val(),
            },
            success: function(response) {
                if(response.success) {
                    $('#emailError').html('Email Already Accessed, Please Enter valid email');
               
                }
            },
            error: function(error) {
                console.log('error');
                alert('error');
            }
        });
    });
});
</script>

</body>
</html>

