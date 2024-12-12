<x-app-layout>
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Dashboard</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
   </head>
   <body>
    <h1>Dashboard</h1>
    <a href="{{route('user-create')}}">Add New User Here</a>

    <div class="showData">
    <table>
  <tr>
  <th>Serial No.</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Country</th>
    <th>City</th>
    <th>Skills</th>
    <th>Image</th>
    <th>Note</th>
    <th collapse="2">Action</th>
  </tr>
 <!-- //@foreach ( $showUserDashboard as $showUserDashboard_details) -->
 <tbody>
 <tr>
 <td></td>
    <!-- <td>{{$showUserDashboard_details['name']}}</td> -->
    <td></td>
    <td></td>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
    <td>Centro comercial Moctezuma</td>
   
  </tr>
 </tbody>
<!-- // @endforeach -->
</table>
    </div>

   </body>
   </html>
</x-app-layout>
