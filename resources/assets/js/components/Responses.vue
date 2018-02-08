<template>
    <!-- Video 38: Creando template y script -->
    <div class="row">
        <a href="#" class="btn btn-outline-primary" v-on:click="load" >Ver respuestas</a>
        
        <div class="col-12 mt-2" v-for="response in responses" >
            <div class="card">

                <div class="card-block" >
                    {{response.user.name}} : {{response.message}}
                </div>
        
                <div class="card-footer text-muted" >
                    {{response.created_at}}
                </div>

            </div>
        
        </div>
    </div>
</template>

<script>
    export default {
        props: ['message'],
        data() {        // El estado del componenete
            return {
                 responses: []
            }
        },

        methods: {
            load() {        // creo q es ajax
                axios.get('/api/messages/'+this.message +'/responses')
                    .then(res => {
                        this.responses = res.data
                    });
            }
        }
    }
</script>
