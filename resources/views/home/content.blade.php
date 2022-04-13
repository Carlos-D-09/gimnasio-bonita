<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Actividades del gimnasio</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="clases">
                <div class="clases-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clases as $clase)
                                <tr>
                                    <td> {{$clase->nombre}} </td>
                                    <td> {{$clase->descripcion}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

