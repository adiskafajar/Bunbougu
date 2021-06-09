<?php 
   use Core\View; 
?>

<!-- <table border="1">
   <thead>
      <tr>
         <th>no</th>
         <th>user</th>
         <th>product</th>
         <th>status</th>
         <th>action</th>
      </tr>
   </thead>
   <tbody>
   <?php foreach ( $transactions as $transaction ) : ?>      
      <tr>
         <td><?= $no-=-1 ?></td>
         <td><?= $transaction['name'] ?></td>
         <td><?= $transaction['product'] ?></td>
         <td><?= $transaction['status'] ?></td>
         <td><a href="<?= View::request($page, 'request=detail_transaction&id='.$transaction['transaction_id']) ?>">detail</a></td>
      </tr>
   <?php endforeach ;?>
   </tbody>
</table> -->