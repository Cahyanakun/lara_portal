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
                        <label for="name" class="col-md-3 control-label">NIK *</label>
                        <div class="col-md-6">
                            <input type="text" id="NI" name="NI" class="form-control">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name *</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Phone *</label>
                        <div class="col-md-6">
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                    </div>       

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Jenis Kelamin *</label>
                        <div class="col-md-6">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Jenis Kelamin....</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>    

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Role *</label>
                        <div class="col-md-6">
                            <select name="role" id="role" class="form-control">
                                <option value="">Roles...</option>
                                <option value="admin">Admin</option>
                                <option value="dosen">Dosen</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>    

                    <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Tanggal Lahir *</label>
                        <div class="col-md-6">
                                <div class="input-group date" id="datepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Alamat *</label>
                        <div class="col-md-6">
                            <textarea name="alamat" id="alamat" rows="4" class="form-control"></textarea>
                        </div>
                    </div>   

                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">E-Mail * </label>
                        <div class="col-md-6">
                            <input type="text" id="email" name="email" class="form-control">
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
