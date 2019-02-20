<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Title *</label>
                        <div class="col-md-6">
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Status *</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control">
                                <option value="">Status....</option>
                                <option value="Publish">Publish</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Description *</label>
                        <div class="col-md-6">
                            <textarea name="body" id="body" rows="4" class="form-control"></textarea>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Photo Profil * </label>
                        <div class="col-md-6">
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>   


                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
