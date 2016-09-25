<!DOCTYPE html>
<html>
    <head>
        <title>Real Time</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
        <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="text-center">Datos</h1>
                        <div class="well">
                            <input type="text" name="search" class="form-control" placeholder="Buscar usuario..." v-model="search" @keyup="searchUsers">
                        </div>
                        <pre>Datos totales: @{{ totalRegisters }}</pre>
                        <table class="table table-striped table-hover" id="example">
                            <thead>
                                <tr class="info">
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(index, user) in displayUsers">
                                    <td>@{{ index + 1 }}</td>
                                    <td>@{{ user.email }}</td>
                                    <td>@{{ user.name }}</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/vue-resource.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
