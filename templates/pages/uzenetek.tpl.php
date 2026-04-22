<?php
  include 'includes/db_connect.php';
  $stmt = $conn->prepare('SELECT * FROM uzenetek ORDER BY datum DESC');
  $stmt->execute();
?>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>Név</th>
      <th>E-mail</th>
      <th>Üzenet</th>
      <th>Dátum</th>

    </tr>
  </thead>
  <tbody>
    <?php
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
      <td><?php echo $data['nev']; ?></td>
      <td><?php echo $data['email']; ?></td>
      <td><?php echo $data['szoveg']; ?></td>
      <td><?php echo $data['datum']; ?></td>
      
    </tr>

    <?php
        }
    ?>
  </tbody>
</table>}