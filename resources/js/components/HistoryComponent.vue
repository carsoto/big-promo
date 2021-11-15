<template>
    <div class="container">
        <h2 class="text-center p-3">Mi historial de puntos</h2>
        <div class="table-responsive">
            <table class="table table-fixed text-center" v-if="history.length > 0">
                <thead>
                    <tr>
                        <th class="col-3">Código</th>
                        <th class="col-3">Fecha</th>
                        <th class="col-3">Puntos</th>
                        <th class="col-3">Puntos Extra</th>
                    </tr>
                </thead>
                <tbody class="text-white font-weight-bold">
                    <tr v-bind:key="index" v-for="(item, index) in history">
                        <td class="col-3">{{ item.code }}</td>
                        <td class="col-3">{{ item.registered }}</td>
                        <td class="col-3">{{ item.points }}</td>
                        <td class="col-3">{{ item.aditional_points }}</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="text-white text-lg-center" v-else>
                Aún no ha registrado ningún código corre a la tienda más cercana
                y compra la BIG de tu preferencia
            </h3>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            history: [],
        };
    },
    mounted() {
        this.setHistory();
    },
    methods: {
        setHistory() {
            axios.get("/api/exchange/history").then((response) => {
                this.history = response.data.data;
            });
        },
    },
};
</script>

<style scoped>
/* width */
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: rgb(165, 0, 0);
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #b30000;
}
</style>
