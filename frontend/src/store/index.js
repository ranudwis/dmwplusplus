import Vue from 'vue'
import Vuex from 'vuex'
import pathify from 'vuex-pathify'
import alert from './alert'
import loader from './loader'
import dashboard from './dashboard'
import notfound from './notfound'

Vue.use(Vuex)

export default new Vuex.Store({
    plugins: [ pathify.plugin ],
    modules: {
        alert,
        loader,
        dashboard,
        notfound,
    }
})
