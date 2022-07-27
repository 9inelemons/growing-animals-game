<template>
    <div class="form">
        <form
            @submit.prevent="handleSubmit"
        >
            <input
                v-model="email"
                name="login"
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
        <router-link :to="{ name: 'register' }">Not registered?</router-link>
    </div>
</template>

<script>
export default {
    name: 'LoginPage',

    computed: {
        loggedIn() {
            return this.$store.state.auth.status.loggedIn;
        },
    },
    created() {
        if (this.loggedIn) {
            this.$router.push('/');
        }
    },

    data() {
        return {
            loading: false,
            email: '',
            password: '',
            message: '',
        }
    },

    methods: {
        handleSubmit() {
            const user = {
                email: this.email,
                password: this.password
            };
            this.loading = true;
            this.$store.dispatch("auth/login", user).then(
                () => {
                    this.$router.push("/");
                },
                (error) => {
                    this.loading = false;
                    this.message =
                        (error.response &&
                            error.response.data &&
                            error.response.data.message) ||
                        error.message ||
                        error.toString();
                }
            );
        },
    },
}
</script>

<style scoped>

</style>
