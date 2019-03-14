<nav aria-label="Page navigation" class="mx-auto mt-3">
    <ul class="pagination">
        <?php
        $this->Paginator->setTemplates([
            'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        ]); ?>
        <?= $this->Paginator->first('« ' . __('First')) ?>
        <?= $this->Paginator->prev('← ' . __('Previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Next') . ' →') ?>
        <?= $this->Paginator->last(__('Last') . ' »') ?>
    </ul>
</nav>