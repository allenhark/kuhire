<div id="masthead">

    <div class="container">

        <div class="masthead-pad">

            <div class="masthead-text">
                <h2>Items</h2>
                <p>
                    Your Items On Scrobber.
                </p>
            </div>
            <!-- /.masthead-text -->

        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /#masthead -->

<div id="content">

    <div class="container">

        <?php foreach ($idata->result() as $data): ?>
            <div class="span12">

                <div class="span2">
                    <a href="<?= base_url($data->slug); ?>">
                        <img src="<?= base_url('images/' . $data->image); ?>" class="thumbnails" alt="<?= $data->name; ?>" style="width: 75%; margin-left: 2%;">
                    </a>
                </div>

                <div class="span6">				

                    <h5><a href="<?= base_url($data->slug); ?>"> <?= $data->name; ?> </a> </h5>

                    <p>
                        <?= word_limiter($data->desc, 10); ?>
                    </p>
                    <a href="<?= base_url('items/edit/' . $data->sess); ?>" class="btn btn-info"><i class="splashy-pencil"></i> Edit </a> 
                    <a href="<?= base_url('items/add/' . $data->sess); ?>" class="btn btn-info"><i class="splashy-add_small"></i> Add Information </a> 
                    <a data-toggle="modal" href="#delete-<?= $data->sess; ?>" class="btn btn-warning"><i class="brocco-icon-trashcan"></i> Delete </a> 

                </div>


            </div>

            <div class="divider"> &nbsp; </div>
            <hr style="opacity: 0.06;" />

            <div class="modal fade hide" id="delete-<?= $data->sess; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="splashy-error_x"></i> </button>
                    <h3>Ask You Sure?</h3>
                </div>
                <form action="" method="get">
                    <div class="modal-body" >
                        You are about to delete <?= $data->name; ?>, 
                        This process might be irreversible.

                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('items/delete/' . $data->sess); ?>" class="btn btn-inverse"><i class="splashy-check"></i> Yeah</a>
                        <a href="javascript:;" class="btn" data-dismiss="modal"><i class="splashy-remove"></i> No</a>

                    </div>
                </form>
            </div>
        <?php endforeach; ?>

    </div>

</div>

</div>