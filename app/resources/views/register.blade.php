<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 well bs-component" style="margin-top: 80px;">
          <form class="form-horizontal" action="/save" method="POST">
            <fieldset>
              <legend>Registro</legend>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                  <input type="text" name="name" class="form-control" id="inputName" placeholder="Nombre" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
                <div class="col-lg-10">
                  <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>