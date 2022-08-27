    <?php if( Flash::has('error') ) {?>
      <div class="row my-0">
        <div class="col">
          <div class="alert alert-danger alert-dismissible fade show text-light my-0" role="alert">
            <strong>Thất bại</strong> <?php echo Flash::get('error');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php }?>
    
    <?php if( Flash::has('success') ) {?>
      <div class="row my-0">
        <div class="col">
          <div class="alert alert-success alert-dismissible text-white fade show my-0" role="alert">
            <strong>Thành công!</strong> <?php echo Flash::get('success');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php }?>