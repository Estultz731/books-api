<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
      table {
        width: 100%;
        border: 1px solid #d9d9dd;
      }

      th, td {
        text-align: left;
        font-family: arial;
        padding: 10px;
      }

      tr:nth-child(odd) {
        background-color: #d9d9dd;
      }
    </style>
  </head>
  <body>
   <table>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
      @foreach ($authors as $author)
        <tr>
          <td>{{$author->first_name}}</td>
          <td>{{$author->last_name}}</td>
        </tr>
      @endforeach

   </table>
  </body>
</html>