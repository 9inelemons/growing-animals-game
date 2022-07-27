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
                v-for="animal in userAnimals"
                :id="animal.id"
            >
                <img
                    :style="{
                        'height': ((animal.size / animal.max_size) * 100)+'%'
                    }"
                    v-if="animal.active"
                    :src="animal.image"
                />
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
        kinds() {
            return this.$store.state.animals.kinds;
        },
        userAnimals() {
            const animals = this.$store.state.animals.animals;
            return this.kinds.map(function (kind) {
                const userAnimal = animals.find(animal => {
                    return animal.kind === kind.kind;
                });
                if (userAnimal) {
                    kind.size = userAnimal.size;
                    kind.active = true
                }
                return kind
            })
        },
    },
    async mounted() {
        if (!this.currentUser) {
            this.$router.push('/auth/login');
        }
        await this.getKinds();
        await this.getMyAnimals();
        Echo.connector.options.auth.headers['Authorization'] = 'Bearer ' + this.currentUser.access_token;
        Echo.private(`App.Models.User.${this.currentUser.user.id}`)
            .listen('AnimalGrowedEvent', (e) => {
                this.$store.commit('animals/growAnimal', e.data);
            });
    },
    methods: {
        logout() {
            this.$store.dispatch('auth/logout');
            this.$router.push('/login');
        },
        async getKinds() {
            this.$store.dispatch('animals/getKinds');
        },
        async getMyAnimals() {
            this.$store.dispatch('animals/getMyAnimals');
        },
        animalStyleObject(animal) {
            const percent = (animal.size / animal.max_size) * 100;
            console.log(animal);
            return {
                'height': percent + '%'
            }
        }
    }
}
</script>

