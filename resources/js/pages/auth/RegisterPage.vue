<template>
    <div class="form">
        <form
            @submit.prevent="handleSubmit"
        >
            <input
                v-model="name"
                name="name"
                type="text"
                placeholder="Name"
            />
            <input
                v-model="email"
                name="email"
                type="text"
                placeholder="Email"
            />
            <input
                v-model="password"
                name="login"
                type="password"
                placeholder="Password"
            />
            <input
                type="submit"
            />
        </form>
        <router-link :to="{ name: 'login' }">Already registered?</router-link>
    </div>
</template>

<script>
export default {
    name: 'RegisterPage',

    computed: {
        loggedIn() {
            return this.$store.state.auth.status.loggedIn;
        },
    },
    mounted() {
        if (this.loggedIn) {
            this.$router.push('/game');
        }
    },

    data() {
        return {
            loading: false,
            name: '',
            email: '',
            password: '',
            message: '',
        }
    },

    methods: {
        handleSubmit() {
            const user = {
                name: this.name,
                email: this.email,
                password: this.password,
            }
            this.message = "";
            this.successful = false;
            this.loading = true;
            this.$store.dispatch("auth/register", user).then(
                (data) => {
                    this.message = data.message;
                    this.successful = true;
                    this.loading = false;
                    this.$router.push('/game');
                },
                (error) => {
                    this.message =
                        (error.response &&
                            error.response.data &&
                            error.response.data.message) ||
                        error.message ||
                        error.toString();
                    this.successful = false;
                    this.loading = false;
                }
            );
        }
    }
}
</script>

<style scoped>

</style>
