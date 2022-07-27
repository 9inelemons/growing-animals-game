import AnimalsService from '../../services/animals.service';
const initialState = {
    kinds: [],
    animals: [],
};
export const animals = {
    namespaced: true,
    state: initialState,
    actions: {
        getKinds({ commit }) {
            return AnimalsService.kinds().then(
                kinds => {
                    commit('kindsSuccess', kinds);
                    return Promise.resolve(kinds);
                },
                error => {
                    commit('kindsFailure');
                    return Promise.reject(error);
                }
            );
        },
        getMyAnimals({ commit }) {
            return AnimalsService.animals().then(
                animals => {
                    commit('mySuccess', animals);
                    return Promise.resolve(animals);
                },
                error => {
                    commit('myFailure');
                    return Promise.reject(error);
                }
            );
        },
        create({ commit }, animalId) {
            return AnimalsService.create(animalId).then(
                animal => {
                    commit('createSuccess', animal);
                    return Promise.resolve(animal);
                },
                error => {
                    commit('createFailure');
                    return Promise.reject(error);
                }
            );
        },
    },
    mutations: {
        kindsSuccess(state, kinds) {
            state.kinds = kinds;
        },
        kindsFailure(state) {
            state.kinds = [];
        },
        mySuccess(state, kinds) {
            state.animals = kinds;
        },
        myFailure(state) {
            state.animals = [];
        },
        growAnimal(state, data) {
            const existsAtIndex = state.animals.findIndex(a => a.kind === data.kind)
            state.animals[existsAtIndex] = {
                ...state.animals[existsAtIndex],
                size: data.size,
            }
        },
        createSuccess(state, animal) {
            state.animals.push(animal);
        },
        createFailure(state) {
            state.animals = [];
        },
    }
};
