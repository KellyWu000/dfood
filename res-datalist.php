<?php
require __DIR__ . '/partial/init.php';

$row = $pdo->query('SELECT * FROM restaurants')->fetchALL();




?>
<?php include __DIR__ . '/partial/html-head.php'; ?>
<style>
  table tbody i.fas.fa-edit {
    color: #014D81;
  }

  table tbody i.fas.fa-trash-alt {
    color: #8C171D;
  }

  .table th,
  .table td {
    vertical-align: middle;
  }
</style>
<?php include __DIR__ . '/partial/navbar.php'; ?>

<div class="container-fluid mt-4">
  <div class="row">
    <div class="col">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">sid</th>
            <th scope="col">res_name</th>
            <!-- <th scope="col">res_img</th> -->
            <th scope="col">res_production</th>
            <th scope="col">res_tel</th>
            <th scope="col">res_starthour</th>
            <th scope="col">res_endhour</th>
            <th scope="col">res_address</th>
            <th scope="col">res_price</th>
            <th scope="col">res_rate</th>
            <th scope="col"> <i class="fas fa-edit"></i></i></th>
            <th scope="col"><i class="fas fa-trash-alt "></i></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($row as $r) : ?>

            <tr>
              <td><?= $r['sid'] ?></td>
              <td><?= $r['res_name'] ?></td>
              <!-- <td><?= $r['res_img'] ?></td> -->
              <td><?= htmlentities($r['res_production']) ?></td>
              <td><?= $r['res_tel'] ?></td>

              <td><?= $r['res_starthour'] ?></td>
              <td><?= $r['res_endhour'] ?></td>
              <td><?= htmlentities($r['res_address']) ?></td>
              <td><?= $r['res_price'] ?></td>
              <td><?= $r['res_rate'] ?></td>
              <td>
                <a href="edit.php">
                  <i class="fas fa-edit"></i>
                </a>
              </td>
              <td>
                <a href="delete.php?sid=<?= $r['sid'] ?>" onclick="return confirm('確定要刪除編號 <?= $r['sid'] ?> 的資料嗎？')">
                  <i class="fas fa-trash-alt "></i>
                </a>
              </td>

            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?php include __DIR__ . '/partial/scripts.php'; ?>
<?php include __DIR__ . '/partial/html-footer.php'; ?>