<html>
  <head>
    <title>Pizza Delivery</title>
    <link rel="stylesheet" href="../css/css_main.css">
  </head>
  <body>
    <div class="container">
      <h1>Pizza Delivery Co.</h1>
      <table>
        <tr>
          <th>Pizza</th>
          <th>Price</th>
          <th>Image</th>
          <th>Add to Cart</th>
        </tr>
        <?php
          require_once "../database/connect.php";

          $sql = "SELECT * FROM pizzas";
          $result = mysqli_query($conn, $sql);
          
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td><img src='img/pizza.jpg' alt='Pizza'></td>";
            echo "<td>";
            echo "<form action='add_to_cart.php' method='post'>";
            echo "<input type='hidden' name='pizza_id' value='" . $row["id"] . "'>";
            echo "<input type='hidden' name='pizza_name' value='" . $row["name"] . "'>";
            echo "<input type='hidden' name='pizza_price' value='" . $row["price"] . "'>";
            echo "<input type='number' name='quantity' min='1' max='100' value='1'>";
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
          }
          mysqli_close($conn);
        ?>
      </table>
      <br>
      <a href="cart.php">View Cart</a>
    </div>
  </body>
</html>