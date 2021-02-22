<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Informacion de la transaccion</h1>
    <a href="<?php echo base_url().'admin/transaksi_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Nueva Transaccion</a>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Cliente / Vehiculo</th>
                        <th>Fecha de Renta/ Fecha de Entrega</th>
                        <th>Precio</th>
                        <th>Penalidad</th>
                        <th>Fecha Retornado</th>
                        <th>Total a Pagar</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($transaction as $t){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($t->transaction_date)); ?></td>
                        <td><?php echo '<i class="fas fa-user"> '.$t->customer_name.'<br><i class="fas fa-car">'.$t->car_brand ?></td>
                        <td><?php echo date('d/m/Y',strtotime($t->borrowing_date_transactions)).'<br>'.date('d/m/Y',strtotime($t->returning_date_transaction)); ?></td>
                        <td><?php echo 'Rp. '.number_format($t->transaction_price) ?></td>
                        <td><?php echo 'Rp. '.number_format($t->amount_transactions) ?></td>
                        <td><?php echo ($t->returned_date_transaction == '0000-00-00') ? '--' : date('d/m/Y',strtotime($t->returned_date_transaction)); ?></td>
                        <td><?php echo 'Rp. '.number_format($t->$total_amount_transaction) ?></td>
                        <td>
                            <?php
                            if($t->transaction_status == 1){
                                echo '<span class="text-success">Realizado</span>';
                            } else {
                            ?>
                            <a class="btn btn-info btn-sm btn-block" href="<?php echo base_url().'admin/transaction_completed/'.$t->transaction_id; ?>">
                                <i class="fas fa-check"></i> Realizar
                            </a>
                            <a class="btn btn-danger btn-sm btn-block" href="<?php echo base_url().'admin/transaction_delete/'.$t->transaction_id; ?>">
                                <i class="fas fa-trash"></i> Cancelar
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>