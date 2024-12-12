<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
   
</head>
<body>
<h2>User Registration Form</h2>
<form action="{{route('create-user')}}" method="post" enctype="multipart/form-data">
@csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" ><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" ><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" ><br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" ></textarea><br>

    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="Male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="Female">
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="Other">
    <label for="other">Other</label><br>

    <label for="country">Country:</label>
    <select id="country" name="country" >
        <option value="">-- Select --</option>
        <option value="USA">USA</option>
        <option value="Canada">Canada</option>
        <option value="UK">UK</option>
        <option value="Australia">Australia</option>
        <option value="India">India</option>
    </select><br>

    <label for="city">City:</label>
    <select id="city" name="city" >
        <option value="">-- Select --</option>
        <option value="amritsar">Amritsar</option>
        <option value="delhi">Delhi</option>
        <option value="ropar">Ropar</option>
        <option value="mohali">Mohali</option>
        <option value="chandigarh">Chandigarh</option>
    </select><br>

    <label>Skills:</label>
    <input type="checkbox" id="html" name="skills[]" value="HTML">
    <label for="html">HTML</label>
    <input type="checkbox" id="css" name="skills[]" value="CSS">
    <label for="css">CSS</label>
    <input type="checkbox" id="javascript" name="skills[]" value="JavaScript">
    <label for="javascript">JavaScript</label>
    <input type="checkbox" id="python" name="skills[]" value="Python">
    <label for="python">Python</label><br>

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*"><br>

    <label for="address">Note:</label>
    <textarea id="note" name="note" ></textarea><br>
    
    <input type="submit" value="Submit">
</form>
</body>
</html>

</body>
</html>