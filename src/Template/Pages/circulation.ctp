<div class="page-title w-100">
    <h2><?= __('Manage borrowings') ?></h2>
    <?= $this->AuthLink->link(
        '<i class="fas fa-fw fa-calendar"></i> ' . __('Manage reservations'),
        ['controller' => 'books', 'action' => 'reservations'],
        ['class' => 'ontitle btn btn-light btn-outline-secondary', 'escape' => false]
    ); ?>
</div>


<div class="row w-100 mx-auto">
    <div class="col-12">
        <div class="card card-body bg-light mb-4">
            <div><h3 class="titresPrets"><i class="fas fa-fw fa-clock text-warning"></i> <?= __('Borrowings awaiting validation'); ?></h3></div>
            <p class="font-italic text-secondary">
                <?= __('Borrowings listed in this area are pending validation.'); ?><br />
                <?= __('That means that the reader expressed his or her will to borrow the book and that you need to confirm the borrowing.'); ?>
            </p>

            <table class="table table-striped table-hover table-sm">
                <thead>
                <tr>
                    <th><?= __('Book title'); ?></th>
                    <th><?= __('Author'); ?></th>
                    <th><?= __('Asked by'); ?></th>
                    <th><?= __('Request date'); ?></th>
                    <th><?= __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a class="text-success mr-2"><i class="fas fa-fw fa-check-circle"></i> Valider</a>
                        <a class="text-danger"><i class="fas fa-fw fa-minus-circle"></i> Supprimer</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row w-100 mx-auto">
    <div class="col-md-6 col-sm-12">
        <div class="card card-body bg-light mb-4">
            <div><h3 class="titresPrets"><i class="fas fa-fw fa-arrow-circle-right text-success"></i> <?= __('Current borrowings'); ?></h3>
                <?= $this->AuthLink->link(
                    __('Access') . " »",
                    ['controller' => 'books', 'action' => 'currentBorrowings'],
                    ['class' => 'float-right btn btn-outline-secondary']
                ); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card card-body bg-light mb-4">
            <div> <h3 class="titresPrets"><i class="fas fa-fw fa-history text-primary"></i> <?= __('Borrowings history'); ?></h3>
                <?= $this->AuthLink->link(
                    __('Access') . " »",
                    ['controller' => 'books', 'action' => 'borrowingHistory'],
                    ['class' => 'float-right btn btn-outline-secondary']
                ); ?>
            </div>
        </div>
    </div>
</div>


