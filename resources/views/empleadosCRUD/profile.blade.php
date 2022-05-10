<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h2> Perfil de cliente</h2>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Datos personales</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="{{asset($cliente->imagen)}}" height="100%" width="100%" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                <h3>{{$cliente->nombre}}</h3>

                <form action="/empleado/cliente/{{$cliente->id}}/edit" method="GET">
                    <button type="submit" class="btn btn-round btn-warning btn-sm"><i class="fa fa-edit m-right-xs"></i>Editar</button>
                </form>
              </div>
              <div class="col-md-9 col-sm-9 ">
                <div class="" ">
                    <ul class="list-unstyled user_data">
                        <li><i class="fa-solid fa-address-card fa-2x"></i></li>
                        <li><i class="fa-solid fa-location-dot fa-2x"></i></li>
                        <li><i class="fa-solid fa-heart fa-2x"></i></li>
                        <li><i class="fa-solid fa-mobile fa-2x"></i></li>
                        <li><i class="fa-solid fa-envelope fa-2x"></i></li>
                        <li><i class="fa-solid fa-calendar fa-2x"></i></li>
                        <li><i class="fa-solid fa-book-medical fa-2x"></i></li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
