import store from './base'

function alert() {
    return {
        visible: false,
        message: null,
        type: null,
    }
}

const getters = {
    color(state) {
        switch (state.type) {
            case 'success': return 'green'
            case 'failed': return 'red'
        }
    },
}

const actions = {
    alert({ commit }, { message, type }) {
        commit('SET_VISIBLE', true)
        commit('SET_MESSAGE', message)
        commit('SET_TYPE', type)
    },
}

export default store(alert, { actions, getters })
