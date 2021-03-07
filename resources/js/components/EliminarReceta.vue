<template>
    <input
        type="submit"
        class="btn btn-danger mb-2 d-block w-100"
        value="Eliminar x"
        @click="eliminarReceta" >
</template>

<script>
    export default {
        props: ['recetaId'],
        methods: {
            eliminarReceta()
            {
                this.$swal.fire({
                        title: '¿Deseas eliminar esta receta?',
                        text: "Una vez eliminada no se puede recuperar",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, estoy seguro/a',
                        cancelButtonText: 'No, conservar'
                    }).then((result) => {
                    if (result.value) {

                        const params = {
                            id: this.recetaId
                        }
                        // Enviar petición de destroy
                        axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                            .then(respuesta => {
                                this.$swal.fire({
                                    title: 'Receta eliminada',
                                    text: 'Se eliminó la receta.',
                                    icon: 'success'
                                });

                                //Eliminar receta del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                            }).catch(error => {
                                // Catch error
                                console.log(error);
                            })

                    }
                })
            }
        }
    }
</script>
