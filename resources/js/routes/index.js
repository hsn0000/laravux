import {createApp} from 'vue'
import { createRouter, createWebHistory, createWebHashHistory } from 'vue-router'

// createApp({}).use(createRouter)

import Home from '../pages/homepage.vue'
import Index from '../pages/posts/index.vue'
import Posts from '../pages/posts/posts.vue'
import Create from '../pages/posts/create.vue'
import View from '../pages/posts/view.vue' 
import Edit from '../pages/posts/edit.vue' 

const routes = [
    {
        path: '/',
        name: 'homepage',
        component: Home
    },
    {
        path: '/posts', 
        component: Index, 
        children: [
            { 
                path: '',
                name: 'posts',
                component: Posts 
            },
            { 
                path: 'create', 
                component: Create 
            },
            { 
                path: ':slug',   
                component: View 
            },
            { 
                path: ':slug/edit',   
                component: Edit 
            },
        ]
    },
]

const router = createRouter({
    history: createWebHashHistory (),
    routes,
});

export default router;