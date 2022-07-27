<template>
    <div
        class="animals-bar"
    >
        <button
            class="animals-button"
            @click="handleBarShowButtonClick"
        >
            <span>+</span>
        </button>
        <div
            class="animal-kinds"
            :class="animalBarClass"
        >
            <div
                v-for="kind in kinds"
                :key="kind.id"
                class="animal-kind"
                :class="isActive(kind)"
            >
                <img :src="kind.image"/>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'AnimalBar',

    data() {
        return {
            isBarShown: false,
        }
    },

    computed: {
        animalBarClass() {
            return {
                'hidden': !this.isBarShown
            }
        },
        kinds() {
            return this.$store.state.animals.kinds;
        },
        userAnimals() {
            return this.$store.state.animals.animals;
        },
    },

    methods: {
        handleBarShowButtonClick() {
            this.isBarShown = !this.isBarShown;
        },
        isActive(item) {
            const isActive = this.userAnimals.some(animal => {
                return animal.kind === item.kind;
            });
            return {
                'active': isActive
            }
        },
    }
}
</script>
