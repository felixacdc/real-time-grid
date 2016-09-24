<!DOCTYPE html>
<html>
    <head>
        <title>Real Time</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="text-center">Datos</h1>
                        <list-users></list-users>
                    </div>
                </div>
            </div>
        </div>
    
        <template id="listUsers">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Email</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(index, user) in users">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.name }}</td>
                    </tr>
                </tbody>
            </table> 
        </template>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="{{ asset('js/vue-resource.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
