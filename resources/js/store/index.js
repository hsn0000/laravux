import {createApp} from 'vue'
import Vuex from 'vuex'

import actions from './action.js'
import mutations from './mutations.js'
import getters from './getters.js'
import state from './state.js'

createApp().use(Vuex)

export default new Vuex.Store({
    state,
    mutations,
    getters,
    actions,
})