<template>
    <!-- Video 38: Creando template y script -->
    <div class="drop-down menu">
        <a :href="'/'+notification.data.follower.username" class="dropdown-item" v-for="notification in notifications" >
            @{{notification.data.follower.username}}, te ha seguido!
        </a>
    </div>
</template>

<script>
    export default {
        data() {        // El estado del componenete
            return {
                 notifications: []
            }
        },
        mounted() {             // lo hara automaticamente
            axios.get('/api/notifications')
                .then ( response => {
                    this.notifications = response.data;
                });
        }
    }
</script>
