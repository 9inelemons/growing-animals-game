<template>
    <div class="game-background">
        <button
            class="logout-button"
            @click="logout"
        >
            Logout
        </button>
        <AnimalBar/>
        <div
            class="user-animals"
        >
            <div
                class="user-animal"
            >

            </div>
        </div>
    </div>
</template>

<script>
import AnimalBar from "../components/AnimalBar.vue";

export default {
    name: 'GamePage',
    components: {AnimalBar},
    data() {
        return {
        }
    },
    computed: {
        currentUser() {
            return this.$store.state.auth.user;
        },
    },
    mounted() {
        if (!this.currentUser) {
            this.$router.push('/auth/login');
        }
        this.getKinds();
        this.getMyAnimals();
    },
    methods: {
        logout() {
            this.$store.dispatch('auth/logout');
            this.$router.push('/login');
        },
        getKinds() {
            this.$store.dispatch('animals/getKinds');
        },
        getMyAnimals() {
            this.$store.dispatch('animals/getMyAnimals');
        },
    }
}
</script>

