<div class="right_col" role="main">
    
        <!--@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        
        <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Búsqueda de pagos</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-12">
                <div class="pagos">
                    <form>
                        <div class="form-group pull-right top_search" >
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar por id">
                            <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button" style="color: white">Buscar</button>
                        </span>
                        </div>
                        </div>
                    </form>
                    <div class="clases-body" >
                        <table id="example2" class="table table-bordered table-hover" >
                            <thead>
                                <tr style="text-align:center">
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Dias</th>
                                    <th>Monto</th>
                                    <th>ID de membresía</th>
                                    <th>ID de empleado</th>
                                    <th>ID de cliente</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr style="text-align:center">
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td> 
                                            <a href="">Ver detalles</a> <br>
                                        </td>
                                    </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
