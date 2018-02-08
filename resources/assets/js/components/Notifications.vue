<template>
    <!-- Video 38: Creando template y script -->
    <div class="dropdown-menu" role="menu">
        <a :href="'/'+notification.data.follower.username" class="dropdown-item" v-for="notification in notifications" >
            @{{notification.data.follower.username}}, te ha seguido!
        </a>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {        // El estado del componenete
            return {
                 notifications: []
            }
        },
        mounted() {             // lo hara automaticamente
            axios.get('/api/notifications')
                .then ( response => {
                    this.notifications = response.data;

                    Echo.private(`App.User.${this.user}`)      // se mantiene escuchando el canal del usuario
                        .notification(notification => {         // por cada notificacion ,
                            this.notifications.unshift(notification);    // coloco arriba de la pila las nuevas
                        });
                });
        }
    }
</script>
