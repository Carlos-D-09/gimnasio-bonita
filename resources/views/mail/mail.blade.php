<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Contacto a soporte técnico</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel" style="height: 100%">
                    <div class="x_title">
                        <h2>Comunica algun error en la plataforma</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive" style="height: 500px;">
                                <form action="/send-email" method="POST">
                                    @csrf
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" name="name" placeholder="Ingresa tu nombre" required="required">
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" placeholder="Ingresa tu email" name="email" required="required" type="email"></div>
                                    </div>
                                    
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align" >Mensaje</label>
                                        <div class="col-md-6 col-sm-6">
                                        <textarea name="message" class="resizable_textarea form-control" placeholder="Escribe el asunto" style="height: 178px;"></textarea></div>
                                    </div>
                                    <div >
                                        <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

