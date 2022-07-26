<template>
    <div class="game-background">
        <button
            class="logout-button"
            @click="logout"
        >
            Logout
        </button>
    </div>
</template>

<script>
export default {
    name: 'GamePage',

    computed: {
        currentUser() {
            return this.$store.state.auth.user;
        }
    },
    mounted() {
        if (!this.currentUser) {
            this.$router.push('/auth/login');
        }
    },
    methods: {
        logout() {
            this.$store.dispatch('auth/logout');
            this.$router.push('/login');
        }
    }
}
</script>

<style scoped>

</style>
