import { createStore } from "vuex";
import { auth } from './modules/auth'
import { animals } from './modules/animals'

const store = createStore({
    modules: {
        auth,
        animals
    },
})

export default store;
