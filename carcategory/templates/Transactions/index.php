<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Transaction> $transactions
 */
?>
<div class="transactions index content">
    <?= $this->Html->link(__('New Transaction'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transactions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('car_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('transaction_id') ?></th>
                    <th><?= $this->Paginator->sort('currency') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('amount_captured') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $this->Number->format($transaction->id) ?></td>
                    <td><?= $transaction->has('car') ? $this->Html->link($transaction->car->id, ['controller' => 'Cars', 'action' => 'view', $transaction->car->id]) : '' ?></td>
                    <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->name, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
                    <td><?= h($transaction->transaction_id) ?></td>
                    <td><?= h($transaction->currency) ?></td>
                    <td><?= $this->Number->format($transaction->amount) ?></td>
                    <td><?= $this->Number->format($transaction->amount_captured) ?></td>
                    <td><?= h($transaction->status) ?></td>
                    <td><?= h($transaction->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
