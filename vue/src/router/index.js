import { createRouter, createWebHistory } from "vue-router";
import dashboard from "../views/dashboard.vue"
import axios from "axios"
import { useStore } from "../store";
import { pinia } from "../main"
import register from "../views/register.vue"
import login from "../views/login.vue"
const routes = [
    {
        path: "/",
        name: "dashboard",
        meta: {requiresAuth:true},
        component: dashboard
    },
    {
        path: "/login",
        name: "login",
        component: login
    },
    {
        path: "/register",
        name: "register",
        component: register
    }
]

const router = createRouter({
    history:createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        let authToken = sessionStorage.getItem("token")
        if (authToken == '' || authToken == null || authToken == undefined) {
            console.log("next login by token == null")
            next('/login');
        } else {
            console.log(authToken)
            const headers = {
                'Authorization': `Bearer ${authToken}`,
                'Content-Type': 'application/json',
            };

            axios.get('/api/user', { headers })
                .then(response => {
                    const store = useStore(pinia)
                    store.user = response.data
                    console.log("next by request succes")
                    next();
                })
                .catch(error => {
                    console.log(error)
                    next('/login');
                    console.log("next login by request failure")
                });
        }
    } else {
        console.log("next by record.meta.requiresAuth")
        next();
    }
  })

export default router;