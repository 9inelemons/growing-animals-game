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
    }
};
