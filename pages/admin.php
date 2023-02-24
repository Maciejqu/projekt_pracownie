<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/css_admin.css">
    <title>Pizza Delivery - Admin Panel</title>
</head>
<body>
    <h1>You are an administrator!</h1>
    <div class="container">
      <h1>These links will help you manage this website</h1>
        <table>
            <tr>
                <th>Link Name</th>
                <th>URL</th>
            </tr>
            <tr>
                <td>Add a new pizza</td>
                <td><a href=admin_add_pizza.php>Let's pizza!</td>
            </tr>
            <tr>
                <td>Admins</td>
                <td><a href=admin_makes_admin.php>Change permissions</a></td>
            </tr>
            <tr>
                <td>The users' view</td>
                <td><a href=main.php>User's view</a></td>
            </tr>           
            <tr>
                <td>Payment</td>
                <td><a href=payment_methods.php>Add payment methods</a></td>
            </tr>
        </table>
    </div>
</body>
</html>