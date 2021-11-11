<template>
    <div class="container">
        <h2 class="text-center p-3">Mi historial de puntos</h2>
        <table class="table">
            <thead class="thead-yellow rounded ">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Puntos Extra</th>
                </tr>
            </thead>
            <tbody class="text-white font-weight-bold">
                <tr>
                <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
