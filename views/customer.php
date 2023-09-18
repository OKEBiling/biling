


<div class="card">
  <h5 class="card-header">Customer data</h5>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>nama</th>
            <th>alamat</th>
            <th>COF</th>
            <th>subscriptions</th>
            <th>anual</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php foreach ($this->customerall->get() as $key => $value): ?>
            <tr>
            <td><strong><?= $value['nama'] ?></strong></td>
            <td><?= $value['alamat'] ?></td>
            <td><?= $value['COF'] ?></td>
            <td><?= $value['subscriptions'] ?></td>
            <td> <?= $value['anual'] ?></td>
          </tr>
            <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>