<template>
    <div class="container">
        <h2 class="text-center p-3">Mi historial de puntos</h2>
        <table class="table">
            <thead class="thead-yellow rounded ">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Puntos Extra</th>
                </tr>
            </thead>
            <tbody class="text-white font-weight-bold">
                <tr v-bind:key="index" v-for="(item, index) in history">
                    <th scope="row">{{item.code}}</th>
                    <td>{{item.registered}}</td>
                    <td>{{item.points}}</td>
                    <td>{{item.aditional_points}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                history: []
            }
        },
        mounted() {
            this.setHistory();
            setTimeout(() => {
                $('#modal-loading').modal('hide');
            },800);
        },
        methods: {
            setHistory() {
                axios.get('api/exchange/history').then(response => {
                    this.history = response.data.data;
                });
            }
        }
    }
</script>
