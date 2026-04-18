<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        include 'logicals/createpilota.php';
        return;
    }

    if ($_GET['action'] == 'edit') {
        include 'logicals/editpilota.php';
        return;
    }

    if ($_GET['action'] == 'delete') {
        include 'logicals/deletepilota.php';
        return;
    }
}
?>

<?php
  include 'includes/db_connect.php';
  $stmt = $conn->prepare('SELECT * FROM pilota ORDER BY az');
  $stmt->execute();
?>

<a href="index.php?oldal=tablazat&action=create">
  <button class="btn btn-primary">Új pilóta</button>
</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Azonosító</th>
      <th>Név</th>
      <th>Nem</th>
      <th>Születési dátum</th>
      <th>Nemzet</th>
      <th>Műveletek</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
      <td><?php echo $data['az']; ?></td>
      <td><?php echo $data['nev']; ?></td>
      <td><?php echo $data['nem']; ?></td>
      <td><?php echo $data['szuldat']; ?></td>
      <td><?php echo $data['nemzet']; ?></td>
      <td>
        <?php
            echo '<a href="index.php?oldal=tablazat&action=edit&id='.$data['az'].'"><button class="btn btn-primary">Módosítás</button></a> ';
            echo '<a href="index.php?oldal=tablazat&action=delete&id='.$data['az'].'"><button class="btn btn-danger">Törlés</button></a>';
        ?>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>